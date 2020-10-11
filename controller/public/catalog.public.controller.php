<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.model.php';

$category_option = readOptionCategory($db);
$price = countPrice($db);

if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
    if (!$currentPage) $currentPage = 1;
} else {
    $currentPage = 1;
}


$ndrArticle = 2;
$limit = ($currentPage - 1) * $ndrArticle;

$category = !empty($_GET['category']) ? $_GET['category'] : '';
$min = !empty($_GET['min']) ? $_GET['min'] : $price['minPrice'];
$max = !empty($_GET['max']) ? $_GET['max'] : $price['maxPrice'];

$where = '';

if (isset($_GET['category'])) {

    if (!empty($_GET['category']) || !empty($_GET['min']) || !empty($_GET['max'])) {

        $where .= " WHERE ";

        if (!empty($_GET['category'])) {

            $where .= " `name_category` = '$category' ";

            if (!empty($_GET['min']) || !empty($_GET['max'])) {

                $where .= " AND `price_article` BETWEEN '$min' AND '$max' ";

            }

        } else {

            $where .= " `price_article` BETWEEN '$min' AND '$max' ";

        }

        $article = readArticle($db, $where, $limit, $ndrArticle);

    } else {

        $article = readArticle($db, $where, $limit, $ndrArticle);

    }

} else {

    $article = readArticle($db, $where, $limit, $ndrArticle);

}

$countArticle = countArticle($db, $where);

$switch = switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max);


require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.view.php';