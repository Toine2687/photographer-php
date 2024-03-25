<?php
$style = 'blog';
$pageTitle = '- Journal';

require_once __DIR__ . '/../models/Singleton.php';
require_once __DIR__ . '/../models/Article.php';

$articles = Article::getAll();

include __DIR__ . '/../views/templates/header.php';
include __DIR__ . '/../views/blog.php';
include __DIR__ . '/../views/templates/footer.php';
