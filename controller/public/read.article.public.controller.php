<?php

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'read.article.public.model.php';


$item = readArticle($_GET['id'], $db);

if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readImg = readImg($id, $db);
    $countImg = mysqli_num_rows($readImg);

    echo lightBoxModel($readImg, $countImg);

}

require_once dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'read.article.public.view.php';