<div id="update" class="hidden">
    <div class="col-12 my-5">
        <h3 class="text-center border-top">- Modification de la galerie -</h3>
    </div>

    <form action="" method="post" class="d-flex flex-column justify-content-center align-items-center" enctype="multipart/form-data">
        <div class="row justify-content-center">

            <div class="mb-3 col-5 col-md-5 text-center">
                <label for="title" class="form-label">Titre</label>
                <input type="text" class="form-control text-center" id="title" name="title" value="<?= $gallery->title ?>" required>
                <p><?= $error["title"] ?? ''  ?></p>
            </div>

            <div class="mb-3 col-8 col-md-5 text-center">
                <label for="users_id" class="form-label">Client</label>
                <select name="users_id" id="users_id" class="form-select">
                    <option value="0" selected disabled>Choisissez un client</option>
                    <?php
                    foreach ($users as $user) {
                        // Uniquement les clients, pas les admins (role == 0)
                        if ($user->role == 0) {
                    ?>

                            <option value="<?= $user->users_id ?>"><?= $user->firstname . ' ' . $user->lastname ?></option>
                    <?php }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3 col-5 col-md-5 text-center">
                <label for="title" class="form-label">Lieu(x)</label>
                <input type="text" class="form-control text-center" id="shooting_location" name="shooting_location" value="<?= $gallery->shooting_location ?>" required>
                <p><?= $error["shooting_location"] ?? ''  ?></p>
            </div>

            <div class="mb-3 col-5 col-md-5 text-center">
                <label for="shooting_date" class="form-label">Date du shooting</label>
                <input type="date" class="form-control text-center" id="shooting_date" name="shooting_date" value="<?= $gallery->shooting_date ?>" required>
                <p><?= $error["shooting_date"] ?? ''  ?></p>
            </div>

            <div class="mb-3 col-8 col-md-8 text-center">
                <label for="main_picture" class="form-label">Image de couverture</label>
                <input type="file" class="form-control" id="main_picture" name="main_picture" value="/public/uploads/galleries/<?= $gallery->main_picture ?>" required>
                <p><?= $error["main_picture"] ?? ''  ?></p>
            </div>

            <button type="submit" class="btn btn-secondary col-5 ">Valider</button>

        </div>
    </form>
</div>
</div>
</section>