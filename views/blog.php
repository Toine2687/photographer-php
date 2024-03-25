<section>
    <div class="blogContainer">

        <?php foreach ($articles as $article) { ?>
            <div class="article">
                <h2><?= $article->title ?></h2>
                <a href="/article?id=<?=$article->articles_id?>"><img src="/public/uploads/articles/<?=$article->main_picture ?>" alt="Article photographe de mariage amiens"></a>
                    <p class="description"><?= $article->description ?></p>
                    <p><a href="/article?id=<?=$article->articles_id?>">Lire la suite</a></p>
            </div>
        <?php } ?>

    </div>
</section>