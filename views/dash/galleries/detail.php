<div class="row align-items-center justify-content-center">
    <p class="text-center"><?= $msg['update'] ?? '' ?></p>
    <div class="col-12 mb-5 text-center">
        <h2> <?= $gallery->title ?></h2>
    </div>

    <div class="col-5 mb-3">
        <img src="/public/uploads/galleries/<?= $gallery->users_id . '/' . $gallery->main_picture ?>" class="object-fit-scale rounded rounded-5 w-100">
    </div>
    <!-- // Informations -->
    <div class="col-1"></div>
    <div class="col-5 mb-3 justify-content-end">
        <p><strong> Client(s) : </strong><?= $gallery->firstname . " " . $gallery->lastname;
                                            if ($gallery->partner_firstname != NULL | $gallery->partner_firstname != '') {
                                                echo ' et ' . $gallery->partner_firstname;
                                            } ?></p>
        <p><strong> Lieu(x) : </strong> <?= $gallery->shooting_location ?></p>
        <p><strong> Shootée le : </strong> <?= date('d m Y',  strtotime($gallery->created_at)) ?></p>
        <p><strong> Envoyée le : </strong> <?= ($gallery->sent_at != NULL) ? date('d m Y',  strtotime($gallery->sent_at)) : 'A envoyer'; ?></p>
        <!-- // Boutons -->
        <i id="modifyPic" class="fa-solid fa-pen me-3 fs-2"></i>

        <a href="/controllers/dash/galleries/sendCtrl.php?id=<?= $galleries_id ?>">
            <?php if ($gallery->sent_at == NULL) { ?>
                <!-- // Si la galerie n'a pas encore été envoyée, afficher un bouton enveloppe -->
                <i class="fa-solid fa-envelope me-3"></i>
            <?php } else {
            ?>
                <!-- // Sinon : afficher une enveloppe avec une checkMark -->
                <i class="fa-solid fa-envelope-circle-check"></i>
            <?php } ?>
        </a>

        <a href="/controllers/dash/galleries/deleteCtrl.php?id=<?= $galleries_id ?>&delete=true"><i class="fa-solid fa-trash "></i></a>

    </div>
</div>