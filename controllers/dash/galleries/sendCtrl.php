<?php
$style = 'dash';
$pageTitle = '- Dashboard | Galerie';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../helpers/pwd.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../helpers/sendMail.php';

User::checkUser();
User::checkAdmin();

$galleries_id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$gallery = Gallery::get($galleries_id);
$user = User::get($gallery->users_id);

// ------- génération du mot de passe ---------
$pwd = PWD::set();
$hashed_password = password_hash($pwd, PASSWORD_DEFAULT);


try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // ========== Objet du mail : verification ============
        $mailObject = trim(filter_input(INPUT_POST, 'mailObject', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($mailObject)) {
            $error["mailObject"] = "Vous devez entrer un objet !";
        } else {
            if (strlen($mailObject) <= 2 || strlen($mailObject) >= 100) {
                $error["mailObject"] = "La longueur de l\'objet est incorrecte";
            }
        }

        // ========== Corps du mail : verification ============v
        $mailBody = trim(filter_input(INPUT_POST, 'mailBody', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($mailBody)) {
            $error["mailBody"] = "Vous devez entrer un message !";
        } else {
            if (strlen($mailBody) <= 2 || strlen($mailBody) >= 10000) {
                $error["mailBody"] = "La longueur du message est incorrecte";
            }
        }

        // ========== Mot de passe hashé stocké ============
        $storedHashedPass = filter_input(INPUT_POST, 'hashed_password'); // stocké ici pour ne pas que le mot de passe regénéré par la réactualisation de la page écrase l'ancien mdp... et sa version hashée


        if (empty($error)) {

            //  ---------ENREGISTER LE PASSWORD EN BASE DE DONNEES via un UPDATE------- :
            $newUser = new User(
                $user->lastname,
                $user->firstname,
                $user->phone,
                $user->mail,
                $user->address,
                $user->zip,
                $user->city,
                $user->role,
                $storedHashedPass, // mot de passe hashé stocké
                $user->partner_lastname,
                $user->partner_firstname
            );
            $passUpdated = $newUser->update($gallery->users_id);
            if ($passUpdated) {
                // -------- Ajout de la date d'envoi en BDD
                $newGallery = new Gallery(
                    $gallery->title,
                    $gallery->shooting_date,
                    $gallery->shooting_location,
                    $gallery->main_picture,
                    $gallery->users_id,
                    date('Y-m-d H:i:s', time()) // <== seul changement
                );
                $galupdated = $newGallery->update($galleries_id);

                if ($galupdated) {
                    $mailSent = sendMail($mailObject, $mailBody, 'ant.petit@pm.me');
                }
                if ($mailSent) {
                    $msg["MdpIn"] = '  La galerie a bien été envoyée .<i class="fa-solid fa-envelope-circle-check fs-4"></i>';
                }
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/galleries/send.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
