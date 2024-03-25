<?php


require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();

$users = User::getAll();

$id = intval(filter_input(INPUT_POST, 'galleries_id', FILTER_SANITIZE_NUMBER_INT));
$gallery = Gallery::get($id);

//===================== Images de la galerie : Nettoyage et validation =======================
if (isset($_FILES['gal_pictures'])) {
    $gal_pictures = $_FILES['gal_pictures'];
    if (!empty($gal_pictures['tmp_name'])) {
        if ($gal_pictures['error'] > 0) {
            $error["gal_pictures"] = "erreur lors du transfert des fichiers";
        } else {
            if (!in_array($gal_pictures['type'], AUTHORIZED_IMAGE_FORMAT)) {
                $error["gal_pictures"] = "Le format des fichiers n'est pas accepté";
            } else {
                $extension = pathinfo($gal_pictures['name'], PATHINFO_EXTENSION);
                $from = $gal_pictures['tmp_name'];
                // Récupération de la donnée exif de date de prise de vue
                $exif = exif_read_data($gal_pictures['tmp_name']);
                $timestamp = strtotime($exif['DateTimeOriginal']);
                // Et renommage des fichiers en fonction de cette exif
                $fileName = 'gal-' . $timestamp . '.' . $extension;
                @mkdir('../../../public/uploads/galleries/' . $gallery->users_id);
                $to = '../../../public/uploads/galleries/' . $gallery->users_id . '/' . $fileName;
                if (move_uploaded_file($from, $to)) {
                    echo 1;
                }
            }
        }
    }
}
