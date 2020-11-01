<?php
require_once dirname(dirname(dirname(__DIR__))). DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.model.php';
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'card.model.php';
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'light.box.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if(empty($id)) {
    header('Location: ?p=create.article.admin');
}

$article = readArticle($id, $db);

if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readImg = readImg($id, $db);
    $countImg = mysqli_num_rows($readImg);

    echo lightBoxModel($readImg, $countImg);

}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.view.php';