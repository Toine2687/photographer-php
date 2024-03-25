<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Antoine Petit - Photographe Mariage Amiens <?= $pageTitle ?? '' ?></title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/assets/img/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/GridOverflow3D.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/ssg.min.css" />
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/contact.css">
    <link rel="stylesheet" href="/public/assets/css/user.css">

    <?php
    if (isset($style)) {
        echo '<link rel="stylesheet" href="/public/assets/css/' . $style . '.css">';
    }
    ?>
</head>

<body>
    <header>
        <?php include __DIR__ . '/user-navBar.php'; ?>
    </header>