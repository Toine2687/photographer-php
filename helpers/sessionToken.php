<?php
require_once __DIR__ . '/../models/User.php';

if (isset($_COOKIE['user'])) {
    $userId = $_COOKIE['user'];
    $user = User::get($userId); 
    
    if ($user) {
        $admin = '1|' . $user->users_id;
        $client = '0|' . $user->users_id;
        $adminExpectedToken = password_hash($admin, PASSWORD_DEFAULT);
        $clientExpectedToken = password_hash($client, PASSWORD_DEFAULT);
    }
}

function generate_session_token($user)
{
    $sessionToken = $user->role . '|' . $user->users_id;
    // Stockage du jeton de session
    $_SESSION['session_token'] = $sessionToken;

    // Création d'un cookie sécurisé
    setcookie('user', (string)$user->users_id, time() + 3600 * 24 * 30, '/', 'test.localhost', true, true);
    setcookie('session_token', $sessionToken, time() + 3600 * 24 * 30, '/', 'test.localhost', true, true);
}
