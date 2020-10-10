<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'delete.img.admin.model.php';

$id = $_GET['id'];
$id_article = selectIdArticle($id ,$db);

if (isset($_GET['id'])) {

    deleteImg($id, $db);
    header("Location: ?p=create.img.admin&id=$id_article");

}
