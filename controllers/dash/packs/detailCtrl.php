<?php
$style = 'dash';
$pageTitle = '- Détail Formule';

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Pack.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();


$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));

// Vérifications avant update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {

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

        //===================== Tarif : Nettoyage  =======================
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
            $newPack = new Pack($label, $duration, $content, $price);
            $isUpdated = $newPack->update($id);
            if ($isUpdated) {
                $msg['update'] = '👌 Formule mise à jour avec succès.';
            } else {
                $error["update"] = '❌ Erreur rencontrée pendant la mise à jour.';
            }
        }
    } catch (\Throwable $th) {
        var_dump($th);
    }
}

// Récupération de la formule cliquée sur list
try {
    $pack = Pack::get($id);
    if (!$pack) {
        throw new Exception('Formule introuvable');
    }
} catch (\Throwable $th) {
    var_dump($th);
}


include __DIR__ . '/../../../views/dash/dash-header.php';
include __DIR__ . '/../../../views/dash/packs/detail.php';
include __DIR__ . '/../../../views/dash/packs/update.php';
include __DIR__ . '/../../../views/dash/dash-footer.php';
