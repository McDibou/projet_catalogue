<?php

// call model of the current page
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'read.article.public.model.php';

// read article used view page
$item = readArticle($_GET['id'], $db);

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
require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'read.article.public.view.php';