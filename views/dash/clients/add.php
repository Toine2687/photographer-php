<form action="" method="post" class="d-flex flex-column justify-content-center">
    <fieldset class="formInputLine">


        <!-- ---------------- Client principal ---------------- -->

        <legend>Client Principal</legend>
        <div class="mb-3 col-10 col-md-5 text-center">
            <label for="firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Prénom" pattern="<?= NAME_PATTERN ?>" required>
            <p><?= $error["firstname"] ?? '' ?></p>
        </div>
        <div class=" mb-3 col-10 col-md-5 text-center">
            <label for="lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Nom" pattern="<?= NAME_PATTERN ?>" required>
            <p><?= $error["lastname"] ?? '' ?></p>
        </div>
    </fieldset>
    <fieldset class=" formInputLine">


        <!-- ---------------- Partenaire éventuel ---------------- -->

        <legend>Partenaire</legend>
        <div class="mb-3 col-10 col-md-5 text-center">
            <label for="partner_firstname" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="partner_firstname" name="partner_firstname" placeholder="Prénom" pattern="<?= NAME_PATTERN ?>">
            <p><?= $error["partner_firstname"] ?? '' ?></p>
        </div>
        <div class=" mb-3 col-10 col-md-5 text-center">
            <label for="partner_lastname" class="form-label">Nom</label>
            <input type="text" class="form-control" id="partner_lastname" name="partner_lastname" placeholder="Nom" pattern="<?= NAME_PATTERN ?>">
            <p><?= $error["partner_lastname"] ?? '' ?></p>
        </div>
    </fieldset>
    <fieldset>


        <!-- ---------------- Coordonnées ---------------- -->

        <legend>Coordonnées</legend>
        <div class="formInputLine">
            <div class="mb-3 col-10 col-md-7 text-center">
                <label for="mail" class="form-label">Addresse Mail</label>
                <input type="email" class="form-control" id="mail" name="mail" placeholder="nom@exemple.com" required>
                <p><?= $error["mail"] ?? '' ?></p>

            </div>
            <div class="mb-3 col-10 col-md-3 text-center">
                <label for="phone" class="form-label">N° Téléphone</label>
                <input type="tel" class="form-control" id="phone" name="phone" placeholder="0123456789" pattern="<?= PHONE_PATTERN ?>" required>
                <p><?= $error["phone"] ?? '' ?></p>
            </div>

        </div>
        <div class="formInputLine">
            <div class="mb-3 col-10 col-md-5 text-center">
                <label for="address" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="XX rue du ...">
                <p><?= $error["address"] ?? '' ?></p>

            </div>
            <div class="mb-3 col-10 col-md-2 text-center">
                <label for="zip" class="form-label">Code Postal</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="75000">
                <p><?= $error["zip"] ?? '' ?></p>

            </div>

            <div class="mb-3 col-10 col-md-2 text-center">
                <label for="city" class="form-label">Ville</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="Amiens">
                <p><?= $error["city"] ?? '' ?></p>

            </div>

            <!-- ---------------- Formule éventuelle ------------------- -->
            <div class="col-5 mb-3">
                <label for="packs" class="form-label">Formule souscrite ?</label>
                <select class="form-control" name="packs" id="packs">
                    <option value="0" selected disabled> Selectionner une formule (facultatif) </option>
                    <?php
                    foreach ($packs as $pack) { ?>
                        <option value="<?= $pack->packs_id ?>"><?= $pack->label ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>

            <!-- ---------------- En faire un admin ? ---------------- -->

            <div class="formInputLine mb-3" id="adminCheckbox">
                <label for="role" class="form-label">Faire de cet utilisateur un admin</label>
                <input class="form-check-input" type="checkbox" name="role" id="role" value="1">
            </div>
        </div>
    </fieldset>

    <!-- ---------------- Validation ---------------- -->

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-secondary mt-3 col-3 justify-content-center">Valider</button>
    </div>

</form>
</div>
</section>