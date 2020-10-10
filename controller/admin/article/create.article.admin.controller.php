<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.model.php';

$article = readArticle($db);
$category = readOptionCategory($db);

if (isset($_POST['create_article'])) {

    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $promo_article = analyseData($_POST['promo_article']);
    $category_id = analyseData($_POST['category_id']);
    $content_article = analyseData($_POST['content_article']);

    $img_article = date('U') . '_' . basename($_FILES['name_img']['name']);

    if (!empty($title_article) && !empty($price_article) && !empty($promo_article) && !empty($category_id) && !empty($content_article) && !empty($img_article)) {

        createArticle($title_article, $price_article, $promo_article, $category_id, $content_article, $img_article, $db);
        move_uploaded_file($_FILES['name_img']['tmp_name'], "public/img");
        header('Location: ?p=create.article.admin');

    }
}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.view.php';