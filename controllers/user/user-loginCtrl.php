<?php
$style = 'user';
$pageTitle = ' Interface Client';

require_once __DIR__ . '/../../config/config.php';
require_once __DIR__ . '/../../models/Singleton.php';
require_once __DIR__ . '/../../models/User.php';
require_once __DIR__ . '/../../helpers/sessionToken.php';

// var_dump($_SESSION); die;

if (isset($_COOKIE['session_token'])){
    $sessionToken = $_COOKIE['session_token'];

    if (password_verify($sessionToken, $adminExpectedToken)) {
        header('location: /controllers/dash/dash-indexCtrl.php');
        die;
    }
    if (password_verify($sessionToken, $clientExpectedToken)) {
        header('location: /ma-galerie');
        die;
    }
}
try {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // ================= Récupération et Verification mail ==================
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        if (empty($mail)) {
            $error["mail"] = "L'adresse mail est obligatoire!!";
        } else {
            $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$testMail) {
                $error["mail"] = "L'adresse email n'est pas au bon format!!";
            }
        }
        // Identification de l'user à partir de son mail
        $user = User::getByMail($mail);

        // ================= Verification mot de passe ==================
        $password = filter_input(INPUT_POST, 'password');
        // si admin => redirection vers dashboard
        if (!empty($password)) {
            if (password_verify($password, $user->password) && $user->role == 1) {
                $_SESSION['user'] = $user;
                generate_session_token($user);
                header('location: /controllers/dash/dash-indexCtrl.php');
                die;
            }
            // si user standard => redirection vers son espace client
            else if (password_verify($password, $user->password) && $user->role == 0) {
                $_SESSION['user'] = $user;
                generate_session_token($user);
                header('location: /ma-galerie');
                die;
                // si les login/mdp ne correspondent pas => message
            } else {
                $error["login"] = "Mot de passe éronné";
            }
        } else {
            $error["login"] = "Mot de passe manquant";
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}

include __DIR__ . '/../../views/users/user-header.php';
include __DIR__ . '/../../views/users/user-login.php';
include __DIR__ . '/../../views/users/user-footer.php';
