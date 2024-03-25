<?php
$style = 'portfolio';
$pageTitle = '- Portofolio';

//récupération et affichage des images de démonstration
$imagesToDisplay = scandir($_SERVER['DOCUMENT_ROOT'] . '/public/assets/img/photo/sample/');
array_splice($imagesToDisplay, 0, 2); // retrait de '.' et '..'
$pathToPortoflioImg = '/public/assets/img/photo/sample';


include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/portfolio.php';
include __DIR__ . '/../views/templates/footer.php';
