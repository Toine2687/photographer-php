<?php
$style = 'dash';
$pageTitle = '- Dashboard | Galerie';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Gallery.php';

User::checkUser();
User::checkAdmin();

$users = User::getAll();

$galleries_id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

$gallery = Gallery::get($galleries_id);
$sent_at = $gallery->sent_at;


// Vérifications avant update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

        //===================== Titre : Nettoyage et validation =======================
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un titre !";
        } else {
            if (strlen($title) <= 2 || strlen($title) >= 100) {
                $error["title"] = "La longueur du titre est incorrecte";
            }
        }

        //===================== Utilisateur : Nettoyage et validation =======================
        $users_id = intval(filter_input(INPUT_POST, "users_id",  FILTER_SANITIZE_NUMBER_INT));
        if (empty($users_id)) {
            $error['users_id'] = 'Précisez l\'identité du client';
        } else {
            $isExist = User::get($users_id);
            if (!$isExist) {
                $error['users_id'] = 'Identité du client incohérente';
            }
        }

        //===================== Titre : Nettoyage et validation =======================
        $shooting_location = trim(filter_input(INPUT_POST, 'shooting_location', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($shooting_location)) {
            $error["shooting_location"] = "Vous devez entrer un lieu au minimum !";
        } else {
            if (strlen($shooting_location) <= 2 || strlen($shooting_location) >= 100) {
                $error["shooting_location"] = "La longueur du nom du lieu est incorrecte";
            }
        }

        //===================== shooting_date : Nettoyage et validation =======================
        $shooting_date = trim(filter_input(INPUT_POST, 'shooting_date', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($shooting_date)) {
            $isOk = filter_var($shooting_date, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/' . REGEX_DATE . '/']]);
            if (!$isOk) {
                $error["shooting_date"] = "La date entrée n'est pas valide!";
            } else {
                $shooting_dateObj = new DateTime($shooting_date);
                $age = date('Y') - $shooting_dateObj->format('Y');
                if ($age > 10 || $age < -5) {
                    $error["shooting_date"] = "La date est trop lointaine";
                }
            }
        }

        //===================== main_picture : Nettoyage et validation =======================
        if (isset($_FILES['main_picture'])) {
            $main_picture = $_FILES['main_picture'];
            if (!empty($main_picture['tmp_name'])) {
                if ($main_picture['error'] > 0) {
                    $error["main_picture"] = "erreur lors du transfert du fichier";
                } else {
                    if (!in_array($main_picture['type'], AUTHORIZED_IMAGE_FORMAT)) {
                        $error["main_picture"] = "Le format du fichier n'est pas accepté";
                    } else {
                        $extension = pathinfo($main_picture['name'], PATHINFO_EXTENSION);
                        $from = $main_picture['tmp_name'];
                        $fileName = uniqid('0img_mp_') . '.' . $extension;
                        $to = '../../../public/uploads/galleries/' . $users_id . '/' . $fileName;
                        move_uploaded_file($from, $to);
                    }
                }
            }
        }
        if (empty($error)) {
            $newGallery = new Gallery($title, $shooting_date, $shooting_location, $fileName, $users_id, $sent_at);
            $isUpdated = $newGallery->update($galleries_id);
            if ($isUpdated) {
                $msg['update'] = '👌 Galerie mise à jour avec succès.';
            } else {
                $error["update"] = '❌ Erreur rencontrée pendant la mise à jour.';
            }
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/galleries/detail.php';
include __DIR__ . '/../../../views/dash/galleries/update.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
