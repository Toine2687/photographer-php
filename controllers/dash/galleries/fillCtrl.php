<?php
$style = 'dash';
$pageTitle = '- Dashboard | Galerie : ajout des images';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Gallery.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();

$users = User::getAll();
$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/galleries/fill.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
