<?php

// call model of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'modify.category.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.category.admin');
}

// read category used view page
$view_modify = readModifyCategory($id, $db);

// modify category
if (isset($_POST['modify_category'])) {

    // analyse data
    $name_category = analyseData($_POST['name_category']);

    // if no field is empty
    if (!empty($id) && !empty($name_category)) {

        // delete shop, return bool. if false return message error
        if(modifyCategory($id, $name_category, $db)) {
            header("Location: ?p=create.category.admin");
        } else {
            $error_modify_category = 'The category could not be modified';
        }

    } else {
        $error_modify_category = 'An error has occurred';
    }

}

// call view of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'modify.category.admin.view.php';