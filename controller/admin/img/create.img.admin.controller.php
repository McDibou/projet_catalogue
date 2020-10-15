<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.img.admin');
}

$img = readImg($id, $db);

if (isset($_POST['create_img'])) {

    $img = analyseData($_FILES['name_img']['name']);
    $img_article = date('U') . '_' . basename($img);

    if (!empty($img) && !empty($id)) {

        createImg($img, $id, $db);
        move_uploaded_file($_FILES['name_img']['tmp_name'], "img/$img");
        header("Location: ?p=create.img.admin&id=$id");

    } else {

        $error_create_img = 'error_create_img';

    }
}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.view.php';
