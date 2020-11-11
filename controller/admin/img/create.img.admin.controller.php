<?php

// call model of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.model.php';
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'upload.img.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.img.admin');
}

// read images used view page
$img = readImg($id, $db);

// add images
if (isset($_POST['create_img'])) {

    if (!empty($_FILES['name_img'])) {

        // add file images to dir
        $img_article = uploadImg($_FILES['name_img']);

        // create images to databases, if false, return message error or redirection page
        if (is_array($img_article)) {
            createImg($img_article[0], $id, $db);
        } else {
            $error_create_img = $img_article;
        }

    } else {
        $error_create_img = 'An error has occurred';
    }
    header("Location: ?p=create.img.admin&id=$id");
}

// switch error delete images
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_create_img = 'The image could not be deleted';
            break;
        case 2 :
            $error_create_img = 'An error has occurred';
            break;
    }
}

// call view of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.view.php';
