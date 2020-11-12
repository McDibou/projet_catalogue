<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

// read all category and category of an article used view page
$category = readCategory($db);
$checked = checkedCategory($id, $db);

// modify category of an article
if (isset($_POST['modify_catalog'])) {

    // create a table of category ids
    $category_id = [];
    if (!empty($_POST['category'])) {
        foreach ($_POST['category'] as $data) {
            if (ctype_digit($data)) {
                $category_id[] = $data;
            }
        }
    }


    if (!empty($category_id)) {

        // update categories of an article, return bool. if false return message error
        if (updateCategory($category_id, $id, $db)) {
            header("Location: ?p=category.article.admin&id=$id");
        } else {
            $error = 'An error has occurred';
        }
    } else {
        $not_field = 'Please select at minimum one field';
    }

}

// call view of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.view.php';