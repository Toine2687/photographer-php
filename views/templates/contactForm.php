<section id="homeContactSection">

    <div>
        <p> Vous désirez en savoir plus ? </p>
        <h3>Contactez moi maintenant</h3>
        <p>Complétez ce formulaire en me fournissant un maximum de détails, je m’engage à vous répondre au plus vite.</p>
    </div>

    <form method="POST" id="homeContactForm">

        <fieldset id="namesFieldset">
            <div id="namesDiv" class="form-floating">
                <label for="names">Vos prénoms et noms</label>
                <input type="text" id="names" name="names" required>
            </div>
        </fieldset>

        <fieldset id="phoneMail">
            <div id="mailDiv" class="form-floating">
                <label for="mail">Votre adresse mail</label>
                <input type="email" name="mail" id="mail" required>
            </div>
            <div id="phoneDiv" class="form-floating">
                <label for="phone">Un numéro de téléphone</label>
                <input type="tel" name="phone" id="phone" required>
            </div>
        </fieldset>

        <fieldset id="event">
            <div class="form-floating">
                <label for="eventDate">Date de l'évènement</label>
                <input type="date" name="eventDate" id="eventDate" required>
            </div>
            <div id="locationDiv" class="form-floating">
                <label for="eventLocation">Lieu(x) de l'évènement</label>
                <input type="text" name="eventLocation" id="eventLocation" required>
            </div>
            <div id="guestsNumberDiv" class="form-floating">
                <label for="guestsNumber">Nombre de convives</label>
                <input type="text" id="guestsNumber" name="guestsNumber">
            </div>
        </fieldset>

        <fieldset id="ceremDiv">
            <legend>Type de cérémonie(s)</legend>
            <div>
                <input type="checkbox" name="ceremony[]" id="ceremCivil" value="Civile">
                <label for="ceremCivil">Civile</label>
            </div>
            <div>
                <input type="checkbox" name="ceremony[]" id="religious" value="Religieuse">
                <label for="religious">Religieuse</label>
            </div>
            <div>
                <input type="checkbox" name="ceremony[]" id="laic" value="Laïque">
                <label for="laic">Laïque</label>
            </div>
        </fieldset>

        <div id="messageDiv" class="form-floating">
            <label for="message">Votre message</label>
            <textarea name="message" id="message" cols="30" rows="10" required placeholder="Donnez-moi des détails ! Qu'est-ce que vous prévoyez pour le grand jour ? Quelles en seront les grandes étapes ? Qu'attendez-vous de votre photographe de mariage (à part de belles photos ;) ?"></textarea>
        </div>

        <?= $error["contact"] ?? '' ?>
        <?= $msg['mailSent'] ?? '' ?>

        <button type="submit" value="Envoyer">Envoyer</button>

    </form>

</section>