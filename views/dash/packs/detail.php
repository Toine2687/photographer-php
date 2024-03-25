<div class="row align-items-center justify-content-center">
    <div class="col-12 mb-5 text-center">
        <h2> <?= $pack->label ?>
            <?php if ($pack->duration != 0) {
                echo ' - ' . $pack->duration . 'heures';
            } ?></h2>
    </div>
    <!-- // Informations -->
    <div class="userData col-4 align-self-start">
        <p><strong> Tarif : </strong> <?= $pack->price ?>€ </p>
        <p><strong> Net d'impot : </strong> <?= $pack->price * .75 ?>€ </p>
        <p><strong> Créée le : </strong> <?= date('d m Y',  strtotime($pack->created_at)) ?></p>
        <p><strong> Dernière MAJ : </strong> <?= date('d m Y',  strtotime($pack->updated_at)) ?></p>
        <!-- // Si la formule a été supprimée. -->
        <?php if (isset($pack->deleted)) { ?>
            <p><strong> Abandonnée le : </strong> <?= date('d m Y',  strtotime($pack->deleted_at)) ?></p>
        <?php } ?>
    </div>

    <div class="col-4 align-self-start">
        <div class="col-12">
            <p><strong> Contenu : </strong></p>
            <p> <?= $pack->content ?></p>
        </div>
        <!-- // Boutons -->
        <div class="col-12 modifiers">            
            <i id="modifyPic" class="fa-solid fa-pen"></i>
            <a href="/controllers/dash/packs/deleteCtrl.php?id=<?= $id ?>&delete=true"><i class="fa-solid fa-trash"></i></a>
        </div>
    </div>
</div>