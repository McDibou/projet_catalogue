<?php

// call model of the current page
require_once dirname(dirname(dirname(__DIR__))). DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if(empty($id)) {
    header('Location: ?p=create.article.admin');
}

// read article used view page
$article = readArticle($id, $db);

// displays the light box of the current article
if (isset($_POST['lightbox'])) {

    // empty the id if different from a number
    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    // read images with a id
    $readImg = readImg($id, $db);
    // count  image recover
    $countImg = mysqli_num_rows($readImg);

    // display lightbox
    echo lightBoxModel($readImg, $countImg);

}

// call view of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.view.php';