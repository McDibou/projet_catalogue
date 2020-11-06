<?php

require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.model.php';
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.img.admin');
}

$img = readImg($id, $db);

if (isset($_POST['create_img'])) {

    if (!empty($_FILES['name_img'])) {

        $img_article = uploadImg($_FILES['name_img']);

        if (is_array($img_article)) {
            createImg($img_article[0], $id, $db);
        } else {
            $error_create_article = $img_article;
        }

    } else {
        $error_create_article = 'error_create_article';
    }

    header("Location: ?p=create.img.admin&id=$id");

}

require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.view.php';
