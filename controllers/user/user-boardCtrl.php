<?php
$style = 'gallery';
$pageTitle = ' Interface Client';

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Singleton.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../models/Gallery.php';

$id = $_SESSION['user']->users_id;
$user = User::get($id);
$gallery = Gallery::getByUser($id);

// Convertit une date ou un timestamp en français
function dateToFrench($date, $format) 
{
    $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
    $french_days = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');
    $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    $french_months = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date) ) ) );
}

//récupération et affichage des images dans user-gallery.php
$imagesToDisplay = scandir($_SERVER['DOCUMENT_ROOT'] .'/public/uploads/galleries/'.$user->users_id);
array_splice($imagesToDisplay, 0, 3); // retrait de '.' et '..'
$pathToUserGallery = '/public/uploads/galleries/'.$user->users_id;


include __DIR__ . '/../../views/users/user-header.php';
include __DIR__ . '/../../views/users/user-board.php';
include __DIR__ . '/../../views/users/user-gallery.php';
include __DIR__ . '/../../views/users/user-footer.php';
