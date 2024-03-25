<div class="row align-items-center justify-content-center">

    <p class="text-center text-danger"><?= $error["mailBody"] ?? '' ?></p>
    <p class="text-center text-danger"><?= $error["mailObject"] ?? '' ?></p>


    <div class="col-12 mb-4 text-center">
        <h2> <?= $gallery->title ?></h2>
        <?php
        if (!empty($msg["MdpIn"])) {
        ?>
            <p class="alert alert-success mt-3 col-8 mx-auto d-flex align-items-center justify-content-center" role="alert"><?= $msg["MdpIn"] ?? '' ?></p>
        <?php } ?>
    </div>


    <form method="post">
        <div class="row">

            <div class="col-8 mb-3 mx-auto d-flex">
                <label for="mailObject" class="text-nowrap me-2">Objet :</label>
                <input type="text" name="mailObject" id="mailObject" class="form-control" value="Votre galerie est en ligne !" required>
            </div>

            <div class="col-10 mb-3 mx-auto">

                <input type="hidden" name="hashed_password" value="<?= $hashed_password ?>">

                <textarea name="mailBody" id="mailBody" cols="30" rows="10" class="form-control" required>
                Bonjour à vous !

                J'ai pris un peu de temps mais après le tri, le traitement et beaucoup d'attention ; vos images sont arrivées !
                J'espère de tout cœur que vous trouverez cette galerie à la hauteur de vos souvenirs.

                Si vous partagez les photos sur les réseaux, il serait très aimable à vous de mentionner mes pages Instagram ou Facebook ou de fournir une simple indication du style « Photographies : AntoinePetit.com ». Ça ne vous coûtera qu'une seconde et encouragera le bouche à oreille. Merci d'avance ;)

                J'aimerai beaucoup avoir votre retour sur les images, n'hésitez pas à me recontacter au plus vite pour me faire part de vos sentiments ou si vous rencontrez le moindre problème. 
                Comme d'habitude, je suis à votre entière disposition. 

                Je travaille d'ores et déjà et sur la suite et ne manquerai pas de revenir vers vous au plus vite afin de vous informer de l'avancée des choses.

                Enfin, je tiens à vous remercier tout particulièrement pour l'accueil que vous m'avez fait ce jour, pour votre bonne humeur et votre énergie. 
                Ce reportage fut un réel plaisir à réaliser !

                Bon, assez de blabla, voici ce qui vous intéresse :

                Votre identifiant : <?= $user->mail ?>

                Votre de mot de passe :  <?= $pwd ?>


                Toutes mes félicitations et merci encore, du fond du cœur.
                Antoine
        </textarea>
            </div>


            <button type="submit" class="btn btn-secondary col-4 mx-auto">Envoyer</button>

        </div>
    </form>


</div>