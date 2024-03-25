<a href="/controllers/dash/galleries/addCtrl.php" class="text-center fs-3 mb-3"><i class="fa-solid fa-plus"></i> Ajouter une galerie</a>


<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Client</th>
            <th scope="col">Date de shooting</th>
            <th scope="col">Date d'envoi</th>

            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($galleries as $gallery) {
        ?>
            <tr>
                <th scope="row"><?= $gallery->galleries_id ?></th>
                <td><?= $gallery->title ?></td>
                <td><?= $gallery->firstname . ' ' . $gallery->lastname ?></td>
                <td><?= date('d m Y',  strtotime($gallery->created_at))  ?></td>
                <td><?= ($gallery->sent_at != NULL) ? date('d m Y',  strtotime($gallery->sent_at)) : 'A envoyer'; ?></td>
                <td><a href="/controllers/dash/galleries/detailCtrl.php?id=<?= $gallery->galleries_id ?>"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="/controllers/dash/galleries/deleteCtrl.php?id=<?= $gallery->galleries_id ?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>