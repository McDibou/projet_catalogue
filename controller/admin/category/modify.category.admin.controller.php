<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'modify.category.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.category.admin');
}

$view_modify = readModifyCategory($id, $db);

if (isset($_POST['modify_category'])) {

    $name_category = analyseData($_POST['name_category']);

    if (!empty($id) && !empty($name_category)) {

        modifyCategory($id, $name_category, $db);
        header("Location: ?p=create.category.admin");

    } else {

        $error_modify_category = 'error_modify_category';

    }

}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'modify.category.admin.view.php';