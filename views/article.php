<section>

    <div class="article">

        <h2><?= $article->title ?></h2>
        <img src="/public/uploads/articles/<?= $article->main_picture ?>" alt="Article photographe de mariage amiens">

        <p class="description"><?= htmlspecialchars_decode($article->content, ENT_HTML5) ?></p>
        <a class="back" href="/journal">Derniers articles</a>
    </div>

</section>