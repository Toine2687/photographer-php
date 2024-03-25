<?php
$style = 'dash';
$pageTitle = '- Dashboard | Categories d\'articles ';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();

$categories = Category::getAll();

include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/categories/list.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
