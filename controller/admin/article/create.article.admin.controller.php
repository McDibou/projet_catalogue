<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.model.php';

$article = readArticle($db);
$category = readOptionCategory($db);

if (isset($_POST['create_article'])) {

    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $content_article = analyseData($_POST['content_article']);

    $promo_article = ctype_digit(analyseData($_POST['promo_article'])) ? $_POST['promo_article'] : NULL;
    $date_promo = ctype_digit(analyseData($_POST['date_promo'])) ? $_POST['date_promo'] : NULL;
    $date_promo = date('Y-m-d H:i:s', strtotime('+' . $date_promo . ' day'));

    $img = analyseData($_FILES['name_img']['name']);
    $img_article = date('U') . '_' . basename($img);

    $category_id = [];
    if (!empty($_POST['category_id'])) {
        foreach ($_POST['category_id'] as $data) {
            if (ctype_digit($data)) {
                $category_id[] = $data;
            }
        }
    }

    if (!empty($title_article) && !empty($price_article) && !empty($category_id) && !empty($content_article) && !empty($img_article)) {

        createArticle($title_article, $price_article, $promo_article, $category_id, $content_article, $img_article, $date_promo, $db);
        move_uploaded_file($_FILES['name_img']['tmp_name'], "img/$img_article");
        header('Location: ?p=create.article.admin');

    } else {

        $error_create_article = 'error_create_article';

    }
}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.view.php';