<form method="post" class="text-center">

    <div class="mb-3 col-8 col-md-8 text-center m-auto">
        <label for="gal_pictures" class="form-label">Images de la galerie</label>
        <input type="file" class="form-control" id="gal_pictures" name="gal_pictures[]" required multiple data-galleries_id="<?= $id ?>">
        <p><?= $error["gal_pictures"] ?? ''  ?></p>
    </div>

    <i id="uploadBtn" class="fa-solid fa-cloud-arrow-up fs-1 text-black text-center mt-5"></i>

    <style>
        #uploadBtn:hover {
            color: gray !important;
            cursor: pointer;
        }
    </style>

</form>
<a href="/controllers/dash/dash-indexCtrl.php" class="text-center fs-4 mt-5">Retour au dashboard</a>

<script src="/public/assets/js/sendPictures.js"></script>