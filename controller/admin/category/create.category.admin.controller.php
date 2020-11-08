<?php

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.model.php';

$category = readCategory($db);
$countCategory = mysqli_num_rows($category);

if (isset($_POST['create_category'])) {

    $name_category = analyseData($_POST['name_category']);

    if (!empty($name_category)) {

        if (createCategory($name_category, $db)) {
            header('Location: ?p=create.category.admin');
        } else {
            $error_create_category = 'The category could not be created';
        }

    } else {
        $error_create_category = 'An error has occurred';
    }
}

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

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.view.php';