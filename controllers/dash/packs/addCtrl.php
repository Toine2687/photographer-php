<?php
$style = 'dash';
$pageTitle = '- Dashboard - Ajout de Formule';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Pack.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();


try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // ---------------- VERIFICATIONS -------------------

        //===================== Nom de formule : Nettoyage  =======================
        $label = trim(filter_input(INPUT_POST, 'label', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($label)) {
            $error["label"] = "Vous devez entrer un titre !";
        }

        //===================== Durée : Nettoyage  =======================
        $duration = intval(filter_input(INPUT_POST, 'duration', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($duration)) {
            if ($duration < 0 || $duration > 25) {
                $error["duration"] = "La durée n'est pas valide!";
            }
        }

        //===================== Tarif : Nettoyage =======================
        $price = intval(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT));
        if (!empty($price)) {
            if ($price < 0 || $price > 10000) {
                $error["price"] = "Le tarif n'est pas valide!";
            }
        } else {
            $error["duration"] = "Vous devez entrer un tarif (0 si c'est gratuit)";
        }

        //===================== Contenu : Nettoyage =======================
        $content = trim(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));

        if (empty($error)) {
            if (Pack::isExist($label) == NULL) {
                $pack = new Pack($label, $duration, $content, $price);
                $isAdded = $pack->add();
                if ($isAdded) {
                    $msg['add'] = '👍 Formule ajoutée';
                }
            } else {
                $msg['add'] = 'Erreur pendant l\'ajout';
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/packs/add.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
