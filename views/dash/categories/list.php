<!-- <a href="/controllers/dash/categories/addCtrl.php" class="text-center fs-4 mb-3"> Ajouter une catégorie <i class="fa-solid fa-plus ms-1"></i></a> -->
<div class="row align-items-center justify-content-center">

    <div class="col-6 d-flex m-auto">
        <form action="/controllers/dash/categories/addCtrl.php" method="post" class="col-10 d-flex flex-column">
            <input type="text" name="title" id="title" class="form-control mb-3 fs-5" placeholder="Nouvelle catégorie">
            <button type="submit" class="btn  btn-outline-secondary text-nowrap">Ajouter une catégorie</button>
        </form>
        <p><?= $msg['add'] ?? '' ?></p>
    </div>

    <div class="col-6 m-auto">
        <table class="table mt-3">
            <tbody>
                <?php
                foreach ($categories as $category) {
                ?>
                    <tr>
                        <th scope="row"><?= $category->title ?></th>

                        <td class="text-end"><a href="/controllers/dash/categories/deleteCtrl.php?id=<?= $category->categories_id ?>&delete=true"><i class="fa-solid fa-trash"></i></a></td>
                    </tr>
                <?php }
                ?>
            </tbody>
        </table>


    </div>