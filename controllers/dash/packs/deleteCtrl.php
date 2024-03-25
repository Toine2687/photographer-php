<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Pack.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();


// Récupération de l'id en paramètre d'URL
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

if (isset($_GET['delete'])) {
    $del = $_GET['delete'];

    if ($del) {
        // Suppression via l'id
        Pack::delete($id);
        // Redirection vers la liste des utilisateurs
        header('location: /controllers/dash/packs/listCtrl.php');
        die;
    }
}
