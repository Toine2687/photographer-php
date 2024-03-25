<nav>
    <a href="/"><img id="logo" src="/public/assets/img/logo_APP.png" alt="logo photographe amiens"></a>

    <div id="navLinks">
        <ul id="menu">
            <li class="menuItem"><a href="/portfolio">Portfolio</a></li>
            <li class="menuItem"><a href="/le-photographe">Photographe</a></li>
            <li class="menuItem"><a href="/controllers/articlesCtrl.php">Journal</a></li>
            <li class="menuItem"><a href="/contact">Contact</a></li>
            <?php if (isset($_SESSION) AND $_SESSION != []) { ?>
                <li class="menuItem"><a href="/controllers/user/user-disconnectCtrl.php">Déconnexion</a></li>
            <?php } else { ?>
                <li class="menuItem"><a href="/clients">Clients</a></li>
            <?php } ?>
        </ul>
    </div>
    <i id="burger" class="fa-solid fa-bars"></i>
</nav>