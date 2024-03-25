<?php
require_once __DIR__ . '/../models/User.php';
// Expressions régulières
define("NAME_PATTERN", "^[A-Za-zéçèê'ù\-]{2,20}[ |\-]{0,1}[A-Za-zéèçê'ù\-]{2,20}$");
define('REGEX_NO_NUMBER', "^[A-Za-z-éèêëàâäôöûüç' ]+$");
define('PHONE_PATTERN', '^[0-9\+\-]{10,18}$');
define('REGEX_ZIPCODE', '^[0-9]{5}$');
define('REGEX_DATE', '^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REGEX_TEXTAREA', '^[a-zA-Z\n\r]*$');
// Formats d'image autorisés
define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);

// Connexion
define("DSN", 'mysql:host=localhost;dbname=photo');
define("USER", '');
define("PASSWORD", '');

session_start();