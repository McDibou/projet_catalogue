<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'delete.img.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// read a id article
$id_article = selectIdArticle($id, $db);

// if id not empty
if (!empty($id)) {

    // read image
    $img = selectImg($id, $db);

    // check if the folder in which we are going to send the image exists, if not create it.
    if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
        unlink('img/original/' . $img);
        unlink('img/thumb/' . $img);
    }

    // delete images, return bool. if false return `get error` used create controller
    if (deleteImg($id, $db)) {
        header("Location: ?p=create.img.admin&id=$id_article");
    } else {
        header("Location: ?p=create.img.admin&id=$id_article&error=1");
    }

} else {
    header("Location: ?p=create.img.admin&id=$id_article&error=2");
}