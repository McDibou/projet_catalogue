<?php

require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.model.php';


$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

$view_modify = readModifyArticle($id, $db);
$category = readCategory($db, $id);
$img = readImg($db, $id);

$article = readArticle($id, $db);

if (isset($_POST['modify_article'])) {

    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $content_article = analyseData($_POST['content_article']);

    if (!empty($id) && !empty($title_article) && !empty($price_article) && !empty($content_article)) {

        modifyArticle($id, $title_article, $price_article, $content_article, $db);
        header("Location: ?p=read.article.admin&id=$id");

    } else {

        $error_modify_article = 'Please fill in all fields correctly';

    }

}

if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readImg = readImg($db, $id);
    $countImg = mysqli_num_rows($readImg);

    echo lightBoxModel($readImg, $countImg);

}


require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.view.php';