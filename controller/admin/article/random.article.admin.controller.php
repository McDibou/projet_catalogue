<?php

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'random.article.admin.model.php';
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'upload.img.admin.model.php';


if (isset($_POST['create_random'])) {

    $number = $id = isset($_POST['nbr_article']) && ctype_digit($_POST['nbr_article']) ? $_POST['nbr_article'] : '';

    if (!empty($number)) {
        randomCreateArticle($number, $db);
        header('Location: ?p=create.article.admin');
    }
}
