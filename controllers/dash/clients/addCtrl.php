<?php
$style = 'dash';
$pageTitle = '- Dashboard | Ajout Clients';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/User.php';
require_once __DIR__ . '/../../../models/Pack.php';
require_once __DIR__ . '/../../../models/User_Pack.php';

User::checkUser();
User::checkAdmin();

$packs = Pack::getAll();

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ---------------- VERIFICATIONS -------------------


        //===================== Client Firstname : Nettoyage et validation =======================
        $firstname = trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($firstname)) {
            $error["firstname"] = "Vous devez entrer un prénom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["firstname"] = "Le prénom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($firstname) <= 2 || strlen($firstname) >= 70) {
                    $error["firstname"] = "La longueur du prénom est incorrecte";
                }
            }
        }


        //===================== Client Lastname : Nettoyage et validation =======================
        $lastname = trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($lastname)) {
            $error["lastname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["lastname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($lastname) <= 2 || strlen($lastname) >= 70) {
                    $error["lastname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== Partner Firstname : Nettoyage et validation =======================
        $partner_firstname = trim(filter_input(INPUT_POST, 'partner_firstname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($partner_firstname)) {
            $error["partner_firstname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($partner_firstname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["partner_firstname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($partner_firstname) <= 2 || strlen($partner_firstname) >= 70) {
                    $error["partner_firstname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== Partner Lastname : Nettoyage et validation =======================
        $partner_lastname = trim(filter_input(INPUT_POST, 'partner_lastname', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($partner_lastname)) {
            $error["partner_lastname"] = "Vous devez entrer un nom!!";
        } else { // Pour les champs obligatoires, on retourne une erreur
            $isOk = filter_var($partner_lastname, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . NAME_PATTERN . '/')));
            // Avec une regex (constante déclarée plus haut), on vérifie si c'est le format attendu 
            if (!$isOk) {
                $error["partner_lastname"] = "Le nom n'est pas au bon format!!";
            } else {
                // Dans ce cas précis, on vérifie aussi la longueur de chaine (on aurait pu le faire aussi direct dans la regex)
                if (strlen($partner_lastname) <= 2 || strlen($partner_lastname) >= 70) {
                    $error["partner_lastname"] = "La longueur du nom est incorrecte";
                }
            }
        }


        //===================== email : Nettoyage et validation =======================
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        if (empty($mail)) {
            $error["mail"] = "L'adresse mail est obligatoire!!";
        } else {
            $testMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
            if (!$testMail) {
                $error["mail"] = "L'adresse email n'est pas au bon format!!";
            }
        }


        //===================== phone : Nettoyage et validation =======================
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($phone)) {
            $error["phone"] = "Le numéro de téléphone est obligatoire!!";
        } else {
            $isOk = filter_var($phone, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . PHONE_PATTERN . '/')));
            if (!$isOk) {
                $error["phone"] = "Le numéro de téléphone n'est pas au bon format!!";
            }
        }


        //===================== Adresse : Nettoyage =======================
        $address = trim(filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($address)) {
            $error["address"] = "Vous devez entrer une adresse !";
        }


        //===================== zipCode : Nettoyage et validation =======================
        $zip = trim(filter_input(INPUT_POST, 'zip', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($zip)) {
            $isOk = filter_var($zip, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => '/' . REGEX_ZIPCODE . '/')));
            if (!$isOk) {
                $error["zip"] = "Vous devez entrer un code postal valide";
            }
        }


        //===================== Ville : Nettoyage  =======================
        $city = trim(filter_input(INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($city)) {
            $error["city"] = "Vous devez entrer une adresse !";
        }


        //===================== Role : Nettoyage  =======================
        $role = intval(filter_input(INPUT_POST, 'role', FILTER_SANITIZE_NUMBER_INT));
        if ($role != 1) {
            $role = 0;
        }


        if (empty($error)) {
            try {
                $instance = Singleton::getInstance();
                $db = $instance->sConnect();
                $db->beginTransaction();


                if (User::isExist($mail) == NULL) {

                    $user = new User($lastname, $firstname, $phone, $mail, $address, $zip, $city, $role, $partner_lastname, $partner_firstname);
                    $isAdded = $user->add();
                    if ($isAdded) {
                        $msg['add'] = '👍 Client ajouté';
                    }
                } else {
                    $msg['add'] = 'Erreur pendant l\'ajout';
                }

                $users_id = $db->lastInsertId();

                // Si une formule est sélectionnée
                if ($_POST['packs'] != 0) {
                    $selectedPack = intval(filter_input(INPUT_POST, 'packs', FILTER_SANITIZE_NUMBER_INT));
                    // Associer la formule et le client
                    $user_pack = new User_Pack($users_id, $selectedPack);
                    $isAdded = $user_pack->add();
                }
                $db->commit();
            } catch (\PDOException $e) {
                $db->rollBack();
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/clients/add.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
