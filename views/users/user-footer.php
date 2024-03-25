<footer>
    <img src="/public/assets/img/logo_APP.png" alt="logo photographe mariage amiens">
    <div id="networks">
        <a href="https://www.facebook.com/AntoinePetit.Photographie/" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://www.instagram.com/antoinepetit.photo/" target="_blank"><i class="fa-brands fa-instagram"></i></i></a>
        <a href="https://vimeo.com/antoinepetitphoto" target="_blank"><i class="fa-brands fa-vimeo-v"></i></a>
    </div>

    <!-- ============== RAPPEL MENU =============== -->

    <div id="navlinksBot">
        <ul id="menuBot">
            <li class="menuItem"><a href="/portfolio">Portfolio</a></li>
            <li class="menuItem"><a href="/le-photographe">Photographe</a></li>
            <li class="menuItem"><a href="/journal">Journal</a></li>
            <li class="menuItem"><a href="/contact">Contact</a></li>
            <?php if (isset($_SESSION) AND $_SESSION != []) { ?>
                <li class="menuItem"><a href="/controllers/user/user-disconnectCtrl.php">Déconnexion</a></li>
            <?php } else { ?>
                <li class="menuItem"><a href="/clients">Clients</a></li>
            <?php } ?>

        </ul>
    </div>

    <!-- ============== LEGAL =============== -->

    <div id="legalDiv">
        <ul>
            <li class="legalLinks">Antoine Petit Photographie Tous droits réservés</li>
            <li class="legalLinks"><a href="/mentions-legales">Mentions légales</a></li>
            <li class="legalLinks"><a href="/conditions-generales">Conditions générales d'utilisation</a></li>
            <li class="legalLinks">SIREN 512375502</li>
            <li class="legalLinks">Développé par : <a href="https://antipetoine.dev">moi-même !</a></li>
        </ul>
    </div>

</footer>
<!-- ////////// FIN FOOTER  ///////////-->

<!-- ============== SCRIPTS =============== -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/9e1c3c59ca.js" crossorigin="anonymous"></script>
<script src="/public/assets/js/general.js"></script>

</body>

</html>