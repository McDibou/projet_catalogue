<?php
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

$category = readCategory($db);
$checked = checkedCategory($id, $db);

if (isset($_POST['modify_catalog'])) {

    $category_id = [];
    if (!empty($_POST['category'])) {
        foreach ($_POST['category'] as $data) {
            if (ctype_digit($data)) {
                $category_id[] = $data;
            }
        }
    }

    if (!empty($category_id)) {
        if (updateCategory($category_id, $id, $db)) {
            header("Location: ?p=category.article.admin&id=$id");
        } else {
            $error = 'An error has occurred';
        }
    } else {
        $not_field = 'Please select at minimum one field';
    }

}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.view.php';