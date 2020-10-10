<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'delete.category.admin.model.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    deleteCategory($id, $db);
    header('Location: ?p=create.category.admin');

}
