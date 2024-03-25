<section class="firstSection" id="userBoardHero" data-background='/public/uploads/galleries/<?= $id . '/' . $gallery->main_picture ?>'>

    <h1><?= $gallery->title ?></h1>
    <h2 class="fs-3"><?= dateToFrench($gallery->shooting_date, 'j F Y') ?></h2>
    
</section>

<section class="container" id="userBoardOptions">

    <div class="row d-flex justify-content-center">

        <div class="col-10 text-center">
            <h3>Bienvenue</h3>
            <p>Téléchargez l'archive complète du reportage ou consultez librement la galerie.</p>
        </div>

        <div class="col-10 text-center mb-5">
            <a href="/public/uploads/archives/<?=$user->firstname.$user->users_id?>.zip" role="button" class="btn btn-secondary">Archive<i class="fa-solid fa-rectangle-history"></i></a>
        </div>

    </div>
</section>

<script src="/public/assets/js/user-Board.js"></script>