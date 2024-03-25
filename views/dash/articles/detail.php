<div class="row align-items-center justify-content-center">
    <div class="col-12 mb-5 text-center">
        <h2> <?= $article->title ?></h2>
    </div>
    <div class="col-5 mb-3">
        <p><strong> Description : </strong></p>
        <p class="mb-5"><?= $article->description ?></p>
    </div>
    <div class="col-2"></div>
    <!-- // Informations -->
    <div class="userData col-3 align-self-start">
        <p><strong> Auteur : </strong> <?= $article->firstname . ' ' . $article->lastname ?></p>
        <p><strong> Créée le : </strong> <?= date('d m Y',  strtotime($article->created_at)) ?></p>
        <p><strong> Dernière MAJ : </strong> <?= date('d m Y',  strtotime($article->updated_at)) ?></p>
        <!-- // Boutons -->
        <div class="col-12 modifiers ">
            <i id="modifyPic" class="fa-solid fa-pen"></i>
            <a href="/controllers/dash//articles/deleteCtrl.php?id=<?= $id ?>&delete=true"><i id="deletePatient" class="fa-solid fa-trash"></i></a>
        </div>
    </div>
    <!-- Article -->
    <div class="col-10">
        <p><strong> Contenu : </strong></p>
        <!-- Décodage de l'encodage dû à HTML_SPECIAL_CHARS -->
        <p><?= htmlspecialchars_decode($article->content, ENT_HTML5) ?></p>
    </div>
</div>