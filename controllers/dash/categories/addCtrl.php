<?php

require_once __DIR__ . '/../../../config/config.php';
require_once __DIR__ . '/../../../models/Singleton.php';
require_once __DIR__ . '/../../../models/Category.php';
require_once __DIR__ . '/../../../models/User.php';

User::checkUser();
User::checkAdmin();


try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //===================== Nom de formule : Nettoyage  =======================
        $title = trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
        // On vérifie que ce n'est pas vide
        if (empty($title)) {
            $error["title"] = "Vous devez entrer un nom !";
        }

        if (empty($error)) {
            if (Category::isExist($title) == NULL) {
                $category = new Category($title);
                // Ajout de la catégorie et redirection
                $isAdded = $category->add();
                if ($isAdded) {
                    header('location: /controllers/dash/categories/listCtrl.php');
                }
            } else {
                $msg['add'] = 'Erreur pendant l\'ajout';
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}
