<form action="" method="post" class="d-flex flex-column justify-content-center">

    <div class="formInputLine">
        <div class="mb-3 col-10 col-md-5 text-center">
            <label for="label" class="form-label">Nom</label>
            <input type="text" class="form-control" id="label" name="label" placeholder="Argent, Or...">
            <p> <?= $error["label"] ?? '' ?></p>
        </div>

        <div class="mb-3 col-10 col-md-5 text-center">
            <label for="duration" class="form-label">Durée (en heures)</label>
            <select class="form-select" name="duration" id="duration">
                <option value="0> ">Indéfinie</option>
                <?php
                for ($i = 1; $i < 25; $i++) { ?>
                    <option value="<?= $i ?> "> <?= $i ?></option>
                <?php
                };
                ?>
            </select>
            <p> <?= $error["duration"] ?? '' ?></p>
        </div>
    </div>

    <div class="formInputLine">
        <div class="mb-3 col-10 col-md-5 text-center">
            <label for="price" class="form-label">Tarif (en euros)</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Exemple : 2000€">
            <p> <?= $error["duration"] ?? '' ?></p>
        </div>
    </div>

    <div class="formInputLine">
        <div class="mb-3 col-10 col-md-11 text-center">
            <label for="content" class="form-label">Contenu</label>
            <input type="text" class="form-control" id="content" name="content" placeholder="Galerie en ligne, album ...">
            <p> <?= $error["content"] ?? '' ?></p>
        </div>
    </div>

    <p> <?= $msg['add'] ?? '' ?></p>
    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-secondary mt-3 col-3 justify-content-center">Valider</button>
    </div>

</form>
</div>
</section>