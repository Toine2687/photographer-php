<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Antoine Petit - Photographe Mariage Amiens <?= $pageTitle ?? '' ?></title>
    <!-- Meta descriptions -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="Antoine Petit - Photographe de mariage à Amiens">
    <meta name="description" content="Photographe mariage à Amiens, plus de 12 ans d'expérience à votre service. Reportages naturels sans pose depuis 2011.">
    <meta name="keywords" content="photographe mariage amiens, photographe mariage oise, photographe mariage seine maritime">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="French">
    <!-- favicon -->
    <link rel="shortcut icon" href="/public/assets/img/favicon.ico" type="image/x-icon">
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- Locomotive scroll -->
    <link href="https://cdn.jsdelivr.net/npm/locomotive-scroll@4.1.4/dist/locomotive-scroll.min.css" rel="stylesheet">
    <!-- Cookie Banner -->
    <link rel="stylesheet" href="/public/assets/css/cookiebanner.style.css">
    <!-- Styles -->
    <link rel="stylesheet" href="/public/assets/css/base.css">
    <link rel="stylesheet" href="/public/assets/css/contact.css">

    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="/public/assets/css/' . $style . '.css">';
    }
    ?>
</head>

<body data-scroll-container>
    <header>
        <?php include __DIR__ . '/navBar.php'; ?>
    </header>
    <div data-scroll-section>