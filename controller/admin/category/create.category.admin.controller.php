<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.model.php';

// read category and count category used view page
$category = readCategory($db);
$countCategory = mysqli_num_rows($category);

// create category
if (isset($_POST['create_category'])) {

    // analyse data
    $name_category = analyseData($_POST['name_category']);

    // if no field is empty
    if (!empty($name_category)) {

        // create promotion, return bool. if false return message error
        if (createCategory($name_category, $db)) {
            header('Location: ?p=create.category.admin');
        } else {
            $error_create_category = 'The category could not be created';
        }

    } else {
        $error_create_category = 'An error has occurred';
    }
}

// switch error delete category
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_message = 'Deletion has failed';
            break;
        case 2 :
            $error_message = 'An error has occurred';
            break;
    }
}

// call view of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.view.php';