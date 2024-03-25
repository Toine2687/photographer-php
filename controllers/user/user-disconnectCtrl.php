<?php
// Supprimer le cookie de session
setcookie('session_token', '', time() - 3600, '/', 'test.localhost', true, true);
setcookie('user', '', time() - 3600, '/', 'test.localhost', true, true);


// Supprimer les informations de session
session_start();
session_unset();
session_destroy();

// Redirection
header('location: /photographe-mariage-amiens');
die;
