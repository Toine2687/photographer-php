<script src="https://cdn.tiny.cloud/1/x4fxygiud6rog5mec98fookfmqm6p8ukxhotmm9iepncon4r/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script src="/public/assets/js/tinyMce.js"></script>


<form method="post" class="col-10 text-center" enctype="multipart/form-data">

    <!-- Catégories  -->
    <div class="row my-5">
        <div class="col-9 mb-3">
            <label for="users_id" class="form-label">Catégorie(s) : </label>
            <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group d-flex flex-wrap">
                <?php
                foreach ($categories as $category) { ?>

                    <input type="checkbox" name="category[]" value="<?= $category->categories_id ?>" class="btn-check" id="btncheck<?= $category->categories_id ?>" autocomplete="off">
                    <label class="btn btn-outline-secondary" for="btncheck<?= $category->categories_id ?>"><?= $category->title ?></label>

                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-2">
            <a href="/controllers/dash/categories/listCtrl.php" class="fs-5 text-nowrap"><i class="fa-solid fa-pen-to-square"></i> Editer les catégories</a>
        </div>
    </div>

    <div class="row mb-5">
        <!-- Titre -->
        <div class="col-4">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" class="form-control" required>
            <?php
            if (!empty($error["title"])) {
            ?>
                <p class="alert alert-danger" role="alert"><?= $error["title"] ?></p>
            <?php } ?>
        </div>

        <!-- Image de couverture -->
        <div class="col-4">
            <label for="main_picture" class="form-label">Image de couverture</label>
            <input type="file" name="main_picture" id="main_picture" accept="image/*" class="form-control" required>
            <?php
            if (!empty($error["main_picture"])) {
            ?>
                <p class="alert alert-danger" role="alert"><?= $error["main_picture"] ?></p>
            <?php } ?>
        </div>

        <!-- Selection de l'auteur -->
        <div class="col-4 mb-3">
            <label for="users_id" class="form-label">Auteur : </label>
            <select name="users_id" id="users_id" class="form-select" required>
                <option value="select" disabled selected>Selectionnez un auteur</option>
                <?php
                foreach ($users as $user) {
                    // Uniquement les utilisateurs admins (role == 1)
                    if ($user->role == 1) {
                        echo '<option value="' . $user->users_id . '">' . $user->firstname . ' ' . $user->lastname . '</option>';
                    }
                }
                ?>
            </select>
            <?php
            if (!empty($error["id"])) {
            ?>
                <p class="alert alert-danger" role="alert"><?= $error["id"] ?></p>
            <?php } ?>
        </div>
    </div>

    <!-- Description -->
    <div class="col-12 mb-3">
        <label for="description" class="form-label">Courte description</label>
        <textarea name="description" id="description" class="form-control" required></textarea>
        <?php
            if (!empty($error["description"])) {
            ?>
                <p class="alert alert-danger" role="alert"><?= $error["description"] ?></p>
            <?php } ?>
    </div>

    <!-- Contenu -->
    <div class="col-12 mb-3">
        <label for="content">Contenu</label>
        <textarea name="content" id="content" required></textarea>
        <?php
            if (!empty($error["content"])) {
            ?>
                <p class="alert alert-danger" role="alert"><?= $error["content"] ?></p>
            <?php } ?>
    </div>

    <p><?= $msg['add'] ?? '' ?></p>

    <button type="submit" class="btn btn-secondary col-3 mt-5">Publier</button>
</form>