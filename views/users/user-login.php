<section class="firstSection" id="userLoginHero">
    <h1>Interface Client</h1>
</section>

<section id="userLogin">
    <div class="container mb-5 d-flex flex-column align-item-center justify-content-center">
        <div class="row d-flex p-4 align-item-center justify-content-center">
            <div class="col-10 text-center mb-5">
                <h2>Vous étiez présent à un mariage que j'ai photographié ?</h2>
                <p>Si vous disposez d'un accès, c'est à vous !</p>
                <p>Sinon, je vous invite à vous rapprocher des mariés pour obtenir le précieux sésame</p>
            </div>
            <form class="col-12 col-md-4 text-center"  method="post">
                <input class="form-control form-control-lg mb-3 text-center" type="mail" name="mail" id="mail" placeholder="Adresse mail">
                <input class="form-control form-control-lg mb-3 text-center" type="password" name="password" id="password" placeholder="Mot de passe">
                <p><?= $error["mail"] ?? '' ?></p>
                <p><?= $error["login"] ?? '' ?></p>
                <button type="submit" class="btn btn-secondary">Valider</button>
            </form>
        </div>
    </div>
</section>