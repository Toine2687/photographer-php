<section id="contactBanner">
    <h1>CONTACT</h1>
</section>

<section id="contactSpeechSection">
    <h2><?= $msg['mailSent'] ?? '' ?></h2>
    <h2>JE SUIS IMPATIENT DE CONNAÎTRE VOTRE PROJET</h2>
    <p id="introSpeech">Dévoilez-moi qui vous êtes, ce que vous aimez, ce que vous prévoyez pour votre mariage. Donnez-moi des détails !</p>
    <p>Dans le but de vous concocter un reportage au plus proche de vos attentes, j’estime qu’il est primordial que l’on se rencontre.</p>
    <p>Que nous échangions sur le programme de la journée, sur ce qui compte à vos yeux, que je vous expose comment je travaille (ni « ouististi », ni cache-cache derrière un tronc d’arbre, ni aucune autre mièvrerie kitsch, vous vous en doutez) et qu’on apprenne un minimum à se connaître avant de savoir si nous pouvons envisager cette journée ensemble; voici l’objectif de ce rendez-vous qui dure en moyenne entre une et deux heures.</p>
    <p>Nous pourrons à loisir nous retrouver dans un café d’Amiens ou d’Abbeville, chez vous si vous habitez les environs ou même en visio si le manque de temps et/ou la distance nous font obstacle.</p>
    <p>Contactez-moi via ce formulaire en me fournissant un maximum de détails, je m’engage à vous répondre au plus vite.</p>
</section>


<section id="homeContactSection">
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


        <button type="submit" value="Envoyer">Envoyer</button>

    </form>
</section>