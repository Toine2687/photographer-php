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
        <a class="go_gridItem" href="<?= $pathToUserGallery . '/' . $image ?>">
            <img src="<?= $pathToUserGallery . '/' . $image ?>">



        </a>
    <?php
    }
    ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/story-show-gallery@3/dist/ssg.min.js"></script>
<script>
    SSG.cfg.globalAuthorCaption =
        "<a href='/ma-galerie'>Retour à la galerie</a>";
    SSG.cfg.watermarkText = "AntoinePetit.com";
    SSG.cfg.watermarkFontSize = 18;
    SSG.cfg.watermarkOffsetX = 98;
    SSG.cfg.imgBorderRadius = 0.3;
    SSG.cfg.watermarkOpacity = 0.1;
    SSG.cfg.showLandscapeHint = false;
</script>