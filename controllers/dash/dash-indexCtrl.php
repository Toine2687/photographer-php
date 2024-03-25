<?php
$style = 'dash';
$pageTitle = '- Dashboard';

require_once __DIR__ . '/../../models/User.php';

User::checkUser();
User::checkAdmin();

include __DIR__ . '/../../views/dash/dash-header.php';
include __DIR__ . '/../../views/dash/dash-index.php';
include __DIR__ . '/../../views/dash/dash-footer.php';
