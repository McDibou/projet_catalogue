<?php

// call model of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

// read article, category and images used view page
$view_modify = readModifyArticle($id, $db);
$category = readCategory($db, $id);
$img = readImg($db, $id);
$article = readArticle($id, $db);

// modify article
if (isset($_POST['modify_article'])) {

    // analyse data
    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $content_article = analyseData($_POST['content_article']);

    // if no field is empty
    if (!empty($id) && !empty($title_article) && !empty($price_article) && !empty($content_article)) {

        // modify article and redirection read article page
        modifyArticle($id, $title_article, $price_article, $content_article, $db);
        header("Location: ?p=modify.article.admin&id=$id");

        // else return message error
    } else {
        $error_modify_article = 'Please fill in all fields correctly';
    }

}

// displays the light box of the current article
if (isset($_POST['lightbox'])) {

    // empty the id if different from a number
    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    // read images with a id
    $readImg = readImg($db, $id);
    // count  image recover
    $countImg = mysqli_num_rows($readImg);

    // display lightbox
    echo lightBoxModel($readImg, $countImg);

}

// call view of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.view.php';