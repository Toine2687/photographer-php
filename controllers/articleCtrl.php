<?php
$style = 'blog';

require_once __DIR__ . '/../models/Singleton.php';
require_once __DIR__ . '/../models/Article.php';

$id = intval(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
$article = Article::get($id);

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/article.php';
include __DIR__ . '/../views/templates/footer.php';