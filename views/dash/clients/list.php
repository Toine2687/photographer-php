<a href="/controllers/dash/clients/addCtrl.php" class="text-center fs-3 mb-3"><i class="fa-solid fa-user-plus"></i> Ajouter un client</a>

<table class="table mt-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Email</th>
            <th scope="col">Ville</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($users as $user) {
        ?>
            <tr>
                <th scope="row"><?= $user->users_id ?></th>
                <td><?= $user->lastname ?></td>
                <td><?= $user->firstname ?></td>
                <td><?= $user->partner_firstname ?></td>
                <td><a href="tel:<?= $user->phone ?>"><?= $user->phone ?></a> </td>
                <td><a href="mailto:<?= $user->mail ?>"><?= $user->mail ?></a></td>
                <td><?= $user->city ?></td>
                <td><a href="/controllers/dash/clients/detailCtrl.php?id=<?= $user->users_id?>"><i class="fa-solid fa-eye"></i></a></td>
                <td><a href="/controllers/dash/clients/deleteCtrl.php?id=<?= $user->users_id?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }
        ?>
    </tbody>
</table>