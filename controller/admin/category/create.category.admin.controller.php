<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.model.php';

$category = readCategory($db);

if (isset($_POST['create_category'])) {

    $name_category = analyseData($_POST['name_category']);

    if (!empty($name_category) ) {

        createCategory($name_category, $db);
        header('Location: ?p=create.category.admin');

    } else {

        $error_create_category = 'error_create_category';

    }
}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.view.php';