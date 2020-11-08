<?php

require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.model.php';

$category_option = readOptionCategory($db);
$price = countPrice($db);

$priceMin = 5;
$priceMax = ceil($price['maxPrice'] + 100);


if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
} else {
    $currentPage = 1;
}

$ndrArticle = 6;
$limit = ($currentPage - 1) * $ndrArticle;

$category = !empty($_GET['category']) ? analyseData($_GET['category']) : '';
$min = !empty($_GET['min']) && ctype_digit($_GET['min']) ? analyseData($_GET['min']) : $priceMin;
$max = !empty($_GET['max']) && ctype_digit($_GET['max']) ? analyseData($_GET['max']) : $priceMax;

$where = '';

if (isset($_GET['category'])) {

    if ($category || $min || $max) {

        $where .= " WHERE ";

        if ($category) {

            $where .= " `name_category` = '$category' ";

            if ($min || $max) {

                $where .= " AND `price_article` BETWEEN '$min' AND '$max' ";
                $article = readArticle($db, $where, $limit, $ndrArticle);

            }

        } else {

            $where .= " `price_article` BETWEEN '$min' AND '$max' ";

            $article = readArticle($db, $where, $limit, $ndrArticle);


        }

    } else {

        $article = readArticle($db, $where, $limit, $ndrArticle);

    }

} else {

    $article = readArticle($db, $where, $limit, $ndrArticle);

}

if (!empty($category)) {
    $countArticle = countWithArticle($db, $where);
} else {
    $countArticle = countArticle($db, $where);
}

$switch = switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max);


if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readImg = readImg($id, $db);
    $countImg = mysqli_num_rows($readImg);

    echo lightBoxModel($readImg, $countImg);

}

require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.view.php';