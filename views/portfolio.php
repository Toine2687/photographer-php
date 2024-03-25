<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/GridOverflow3D.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/ssg.min.css" />

<section id="portfolioIntroSection">
    <div id="portfIntroLeft">
        <h1>Portfolio</h1>
    </div>
    <div id="portfIntroRight">
        <h2>Ce que j'ai à vous offrir</h2>
        <p>Émotions fortes, petits détails, larmes, éclats de rire et regards complices, voici ce que je documente depuis plus de 10 ans en tant que photographe de mariage.</p>
        <p>Vous trouverez ici ce que d'autres couples m'ont permis d'immortaliser de façon moderne, vivante et sensible.</p>
    </div>
</section>

<section id="portfolioNumbersSection">
    <div>
        <p class="portfNumber">150+</p>
        <p class="portfNumberSub">COUPLES M'ONT FAIT CONFIANCE</p>
    </div>
    <div>
        <p class="portfNumber">12+</p>
        <p class="portfNumberSub">ANNEES PASSEES A DOCUMENTER VOS PLUS BELLES JOURNEES</p>
    </div>
    <div>
        <p class="portfNumber">1.500+</p>
        <p class="portfNumberSub">HEURES DE REPORTAGE</p>
    </div>
    <div>
        <p class="portfNumber">100K+</p>
        <p class="portfNumberSub">IMAGES REALISEES <br> (AVEC AMOUR)</p>
    </div>
</section>

<section>

    <style>
        /* configuration de Grid Overflow  */

        .gridOverflow {
            --gridGap: 3px;
            --itemMinWidth: 200px;
            --itemAspectRatio: 1;
            --itemRounding: 0px;
        }
    </style>


    <div class="go-masonry gridOverflow ssg fs ssgdim">
        <?php
        foreach ($imagesToDisplay as $image) { ?>
            <a class="go_gridItem" href="<?= $pathToPortoflioImg . '/' . $image ?>">
                <img src="<?= $pathToPortoflioImg . '/' . $image ?>">
            </a>
        <?php
        }
        ?>
    </div>
</section>

<!-- Story Show Gallery import and config -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/ssg.min.js"></script>
<script>
    SSG.cfg.globalAuthorCaption =
        "<a href='/portfolio'>Retour au portfolio</a>";
    SSG.cfg.watermarkText = "AntoinePetit.com";
    SSG.cfg.watermarkFontSize = 18;
    SSG.cfg.watermarkOffsetX = 98;
    SSG.cfg.imgBorderRadius = 0.3;
    SSG.cfg.watermarkOpacity = 0.1;
    SSG.cfg.showLandscapeHint = false;
</script>