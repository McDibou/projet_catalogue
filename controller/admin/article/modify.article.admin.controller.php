<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

$view_modify = readModifyArticle($id, $db);
$category = readOptionCategory($db);

if (isset($_POST['modify_article'])) {

    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $promo_article = analyseData($_POST['promo_article']);
    $category_id = analyseData($_POST['category_id']);
    $content_article = analyseData($_POST['content_article']);

    if (empty($id) && !empty($title_article) && !empty($price_article) && !empty($promo_article) && !empty($category_id) && !empty($content_article)) {

        modifyArticle($id, $title_article, $price_article, $promo_article, $category_id, $content_article, $db);

        header("Location: ?p=read.article.admin&id=$id");

    } else {

        $error_modify_article = 'error_modify_article';

    }

}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.view.php';