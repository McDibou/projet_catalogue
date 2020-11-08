<?php
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'delete.img.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

$id_article = selectIdArticle($id ,$db);

if (!empty($id)) {

    $img = selectImg($id,$db);

    if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
        unlink('img/original/' . $img);
        unlink('img/thumb/' . $img);
    }

    if(deleteImg($id, $db)) {
        header("Location: ?p=create.img.admin&id=$id_article");
    } else {
        header("Location: ?p=create.img.admin&id=$id_article&error=1");
    }

} else {
    header("Location: ?p=create.img.admin&id=$id_article&error=2");
}