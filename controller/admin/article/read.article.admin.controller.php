<?php
require_once dirname(dirname(dirname(__DIR__))). DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.model.php';

$id = $_GET['id'];
$article = readArticle($id, $db);

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.view.php';