

<a href="/controllers/dash/articles/addCtrl.php" class="text-center fs-3 mb-3"><i class="fa-solid fa-plus"></i> Ajouter un article</a>


<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Auteur</th>
            <th scope="col">Première publication :</th>
            <th scope="col">Dernière MAJ</th>

            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($articles as $article) {
        ?>
            <tr>
                <th scope="row"><?= $article->articles_id ?></th>
                <td><?= $article->title ?></td>
                <td><?= $article->description ?></td>
                <td><?= $article->firstname.' '.$article->lastname ?></td>
                <td><?= date('d m Y',  strtotime( $article->created_at))  ?></td>
                <td><?= date('d m Y',  strtotime( $article->updated_at))  ?></td>
                <td><a href="/controllers/dash/articles/detailCtrl.php?id=<?= $article->articles_id?>"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="/controllers/dash/articles/deleteCtrl.php?id=<?= $article->articles_id?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>