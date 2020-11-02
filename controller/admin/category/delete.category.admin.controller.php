<?php
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'delete.category.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (!empty($id)) {

    deleteCategory($id, $db);
    header('Location: ?p=create.category.admin');

} else {

    header('Location: ?p=create.category.admin');

}