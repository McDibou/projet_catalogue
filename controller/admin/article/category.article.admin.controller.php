<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.model.php';

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
        updateCategory($category_id, $id, $db);
        header("Location: ?p=category.article.admin&id=$id");
    }

    $error_category_article = 'error_category_article';

}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.view.php';