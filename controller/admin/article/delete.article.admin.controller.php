<?php

require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {

    $pics = selectImg($id, $db);

    foreach ($pics as $img) {

        $img = $img['name_img'];

        if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
            unlink('img/original/' . $img);
            unlink('img/thumb/' . $img);
        }

    }

    if (deleteArticle($id, $db)) {
        header('Location: ?p=create.article.admin');
    } else {
        header('Location: ?p=create.article.admin&error=2');
    }

} else {
    header('Location: ?p=create.article.admin&error=4');
}