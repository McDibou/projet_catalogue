<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.model.php';

$id = $_GET['id'];

$img = readImg($id, $db);

if (isset($_POST['create_img'])) {

    $img = date('U') . '_' . basename($_FILES['name_img']['name']);

    if (!empty($img)) {
        createImg($img,$id, $db);
        move_uploaded_file($_FILES['name_img']['tmp_name'], "public/img");
        header("Location: ?p=create.img.admin&id=$id");
    }


}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.view.php';
