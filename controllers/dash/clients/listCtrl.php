<?php
$style = 'dash';
$pageTitle = '- Dashboard | Clients';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/User_Pack.php';
require_once __DIR__ . '/../../../models/Pack.php';

User::checkUser();
User::checkAdmin();

$users = User::getAll();

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/clients/list.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
