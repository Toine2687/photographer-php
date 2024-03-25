<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Dashboard Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/public/assets/img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <link rel="stylesheet" href="/public/assets/css/dash/dash.css">
</head>

<body>
    <header>
        <nav class="mb-5">
            <a href="/controllers/dash/dash-indexCtrl.php"><img id='logo' src="/public/assets/img/logo_APP.png" alt="logo photographe amiens"></a>
            <div id="navLinks">
                <ul id="menu">
                    <li class="menuItem"><a href="/controllers/dash/clients/listCtrl.php">Clients</a></li>
                    <li class="menuItem"><a href="/controllers/dash/galleries/listCtrl.php">Galeries</a></li>
                    <li class="menuItem"><a href="/controllers/dash/articles/listCtrl.php">Articles</a></li>
                    <li class="menuItem"><a href="/controllers/dash/packs/listCtrl.php">Formules</a></li>
                    <li class="menuItem"><a href="/photographe-mariage-amiens">Retour au site</a></li>
                    <li class="menuItem"><a href="/controllers/dash/dash-disconnectCtrl.php"><i class="fa-solid fa-arrow-right-from-bracket"></i>Deconnexion</a></li>
                </ul>
            </div>
            <i id="burger" class="fa-solid fa-bars"></i>
        </nav>
    </header>
<div class="d-flex flex-direction-column justify-content-center">
    <section class="pt-5 pt-md-0">
        <div class="container mb-5 d-flex flex-column align-item-center justify-content-center">
            <div class="row d-flex align-item-center justify-content-center p-5 mt-5">

                <h1 class="col-12 text-center mt-0 mb-4"><?= $pageTitle ?? '' ?> -</h1>