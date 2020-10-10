<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin'. DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    deleteArticle($id, $db);
    header('Location: ?p=create.article.admin');

}
