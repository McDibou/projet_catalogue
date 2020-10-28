<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'delete.img.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

$id_article = selectIdArticle($id ,$db);

if (!empty($id)) {

    $img = selectImg($id,$db);

    if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
        unlink('img/original/' . $img);
        unlink('img/thumb/' . $img);
    }

    deleteImg($id, $db);
    header("Location: ?p=create.img.admin&id=$id_article");

} else {

    header("Location: ?p=create.img.admin&id=$id_article");

}