<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'show.article.admin.model.php';

$id = $_GET['id'];
$show = $_GET['show'];

if ($show === '1') {
    $article = updateShowArticle('0', $id, $db);
    header('Location: ?p=create.article.admin');
} else {
    $article = updateShowArticle('1', $id, $db);
    header('Location: ?p=create.article.admin');
}