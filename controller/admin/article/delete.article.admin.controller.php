<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {

    $pics = selectImg($id,$db);

    foreach ($pics as $img) {

        $img = $img['name_img'];
        $img = "img/$img";

        if (file_exists($img)) {
            unlink($img);
        }

    }

    deleteArticle($id, $db);
    header('Location: ?p=create.article.admin');

} else {

    header('Location: ?p=create.article.admin');

}