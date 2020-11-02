<?php
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.model.php';
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'upload.img.admin.model.php';

if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
} else {
    $currentPage = 1;
}

$ndrArticle = 10;
$limit = ($currentPage - 1) * $ndrArticle;

$category = readOptionCategory($db);
$totArticle = readCountArticle($db);
$article = readArticle($db, $limit, $ndrArticle);

$countArticle = mysqli_num_rows($article);
$countCategory = mysqli_num_rows($category);

$switchArticle = switchArticle($totArticle, $currentPage, $ndrArticle);

if (isset($_POST['create_article'])) {

    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $content_article = analyseData($_POST['content_article']);

    $category_id = [];
    if (!empty($_POST['category_id'])) {
        foreach ($_POST['category_id'] as $data) {
            if (ctype_digit($data)) {
                $category_id[] = $data;
            }
        }
    }

    if (!empty($title_article) && !empty($price_article) && !empty($category_id) && !empty($content_article)) {

        if (!empty($_FILES['name_img'])) {

            $img_article = uploadImg($_FILES['name_img']);

            if (is_array($img_article)) {
                createArticle($title_article, $price_article, $category_id, $content_article, $img_article[0], $db);
            } else {
                $error_create_article = $img_article;
            }

        } else {
            $error_create_article = 'error_create_article';
        }

        header('Location: ?p=create.article.admin');

    } else {
        $error_create_article = 'error_create_article';
    }

}

require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.view.php';