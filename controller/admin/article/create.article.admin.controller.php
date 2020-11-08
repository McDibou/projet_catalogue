<?php
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.model.php';
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'upload.img.admin.model.php';

if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
} else {
    $currentPage = 1;
}

$ndrArticle = 10;
$limit = ($currentPage - 1) * $ndrArticle;

$totArticle = readCountArticle($db);

$article = readArticle($db, $limit, $ndrArticle);
$category = readOptionCategory($db);

$countArticle = ($article !== false) ? mysqli_num_rows($article) : 0;
$countCategory = ($category !== false) ? mysqli_num_rows($category) : 0;

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
                header('Location: ?p=create.article.admin');
            } else {
                $error_create_article = $img_article;
            }

        } else {
            $error_create_article = 'An error has occurred';
        }

    } else {
        $error_create_article = 'Please fill in all fields correctly';
    }

}

if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_message = 'The deletion of failed images';
            break;
        case 2 :
            $error_message = 'Deletion has failed';
            break;
        case 3 :
            $error_message = 'Please select multiple fields';
            break;
        case 4 :
            $error_message = 'An error has occurred';
            break;
    }
}

require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.view.php';