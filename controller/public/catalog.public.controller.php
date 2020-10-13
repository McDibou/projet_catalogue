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

$ndrArticle = 1;
$limit = ($currentPage - 1) * $ndrArticle;

$category = !empty($_GET['category']) ? analyseData($_GET['category']) : '';
$min = !empty($_GET['min']) && ctype_digit($_GET['min']) ? analyseData($_GET['min']) : $price['minPrice'];
$max = !empty($_GET['max']) && ctype_digit($_GET['max']) ? analyseData($_GET['max']) : $price['maxPrice'];

$where = '';

if (isset($_GET['search'])) {

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

            $article = readGlobalArticle($db, $where, $limit, $ndrArticle);

        }

    } else {

        $article = readGlobalArticle($db, $where, $limit, $ndrArticle);

    }

} else {

    $article = readGlobalArticle($db, $where, $limit, $ndrArticle);

}

//$countArticle = countArticle($db, $where);

//$switch = switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max);

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.view.php';