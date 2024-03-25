<?php

require_once __DIR__ . '/../helpers/sendMail.php';


//  ######### Formulaire de contact ##############
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Noms des prospects
        $names = trim(filter_input(INPUT_POST, 'names', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($names)) {
            $error["contact"] = "Vous devez entrer votre nom";
        }

        // Adresse mail des prospects
        $mail = trim(filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL));
        if (empty($mail)) {
            $error["mail"] = "Vous devez entrer votre adresse mail";
        } else {
            if (strlen($mail) <= 2 || strlen($mail) >= 100) {
                $error["contact"] = "La longueur de l\'adresse mail est incorrecte";
            }
        }

        // Téléphone des prospects
        $phone = trim(filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($phone)) {
            $error["contact"] = "Vous devez entrer votre nom";
        }

        // Date de l'événement
        $eventDate = trim(filter_input(INPUT_POST, 'eventDate', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($eventDate)) {
            $error["contact"] = "Veuillez préciser une date";
        }

        // Lieu(x) de l'événement
        $eventLocation = trim(filter_input(INPUT_POST, 'eventLocation', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($eventLocation)) {
            $error["contact"] = "Veuillez préciser un lieu, même approximatif";
        }

        // Nombre de convives
        $guestsNumber = trim(filter_input(INPUT_POST, 'guestsNumber', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($guestsNumber)) {
            $guestsNumber = 'Non renseigné';
        }

        //Type de cérémonie
        $ceremony = $_POST['ceremony'];
        if (empty($ceremony)) {
            $ceremony[0] = 'Non renseigné';
        }

        //Message des prospects
        $message = trim(filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS));
        if (empty($message)) {
            $error["contact"] = "Avec un message ce serait mieux, donnez moi un maximum de détails !";
        }


        if (empty($error)) {

            $object =
                '<p>Noms :' . $names . '</p>
            <br>
            <p>Adresse :' . $mail . '</p>
            <p>Téléphone :' . $phone . '</p>
            <br>
            <p>Date :' . $eventDate . '</p>
            <p>Lieu(x) :' . $eventLocation . '</p>
            <p>Convives :' . $guestsNumber . '</p>
            <p>Cérémonie(s) : <li>' . (implode(' <li> ', $ceremony)) . '</p>
            <br>
            <p>Message :' . $message . '</p>';

            $msgSent = sendMail(
                'Prise de contact de ' . $names, // Sujet du mail
                $object, // Objet du mail
                'contact@antoinepetit.com' // destinataire
            );
            if ($msgSent) {
                $msg['mailSent'] = 'Merci pour votre message, je m\'effroce d\'y répondre au plus vite ! Sans réponse de ma part sous 72 heures, n\'hésitez pas à me contacter au 06.28.18.78.60';
            }
        }
    }
} catch (\Throwable $th) {
    var_dump($th);
}


$style = 'home';
$pageTitle = '- Accueil';

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/home.php';
include __DIR__ . '/../views/templates/contactForm.php';
include __DIR__ . '/../views/templates/footer.php';
