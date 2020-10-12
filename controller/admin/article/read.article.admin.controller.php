<?php
require_once dirname(dirname(dirname(__DIR__))). DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if(empty($id)) {
    header('Location: ?p=create.article.admin');
}

$article = readArticle($id, $db);
$category = readCategory($id,$db);
$img = readImg($id, $db);

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.view.php';