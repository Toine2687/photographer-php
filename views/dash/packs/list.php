<a href="/controllers/dash/packs/addCtrl.php" class="text-center fs-3 mb-3"><i class="fa-solid fa-plus"></i> Ajouter une formule</a>


<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Durée</th>
            <th scope="col">Tarif</th>
            <th scope="col">Net</th>
            <th scope="col">Dernière MAJ</th>
            <th scope="col">Contenu</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($packs as $pack) {
        ?>
            <tr>
                <th scope="row"><?= $pack->packs_id ?></th>
                <td><?= $pack->label ?></td>
                <td><?= $pack->duration ?></td>
                <td><?= $pack->price ?></td>
                <td><?= $pack->price*0.75 ?></td>
                <td><?= date('d m Y',  strtotime( $pack->updated_at))  ?></td>
                <td><?= $pack->content ?></td>
                <td><a href="/controllers/dash/packs/detailCtrl.php?id=<?= $pack->packs_id?>"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="/controllers/dash/packs/deleteCtrl.php?id=<?= $pack->packs_id?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>