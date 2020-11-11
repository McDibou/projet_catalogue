<?php

// call model of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id not empty
if (!empty($id)) {

    // read images
    $pics = selectImg($id, $db);

    // browse images table
    foreach ($pics as $img) {

        $img = $img['name_img'];

        // if images exist in the folders, delete them.
        if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
            unlink('img/original/' . $img);
            unlink('img/thumb/' . $img);
        }

    }

    // delete images database, return bool. if false return `get error` used create controller
    if (deleteArticle($id, $db)) {
        header('Location: ?p=create.article.admin');
    } else {
        header('Location: ?p=create.article.admin&error=2');
    }

} else {
    header('Location: ?p=create.article.admin&error=4');
}