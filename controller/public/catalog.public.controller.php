<?php

// call model of the current page
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.model.php';

// read categories used view page
$category_option = readOptionCategory($db);

// read price used view page
$price = countPrice($db);

// variable initialization
$priceMin = 5;
$priceMax = ceil($price['maxPrice'] + 100);

// if the `get switch` exists, replace the $currentPage variable
if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
} else {
    $currentPage = 1;
}

// limit number article by page
$ndrArticle = 6;
// stores the number where starts the limit for the request sql
$limit = ($currentPage - 1) * $ndrArticle;

// analyse `get` url
$category = !empty($_GET['category']) ? analyseData($_GET['category']) : '';
$min = !empty($_GET['min']) && ctype_digit($_GET['min']) ? analyseData($_GET['min']) : $priceMin;
$max = !empty($_GET['max']) && ctype_digit($_GET['max']) ? analyseData($_GET['max']) : $priceMax;

// initializes the condition construction
$where = '';

// if the user makes a search
if (isset($_GET['category'])) {

    // if no field is empty, constructs the condition according to the search chooses
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

            // read article with all condition chooses
            $article = readArticle($db, $where, $limit, $ndrArticle);


        }

    } else {

        // read article with all condition chooses
        $article = readArticle($db, $where, $limit, $ndrArticle);

    }

} else {

    // read article with all condition chooses
    $article = readArticle($db, $where, $limit, $ndrArticle);

}

// counts items with/without category for pagination
if (!empty($category)) {
    $countArticle = countWithArticle($db, $where);
} else {
    $countArticle = countArticle($db, $where);
}

// read pagination used view page
$switch = switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max);

// displays the light box of the current article
if (isset($_POST['lightbox'])) {

    // empty the id if different from a number
    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    // read images with a id
    $readImg = readImg($id, $db);
    // count  image recover
    $countImg = mysqli_num_rows($readImg);

    // display lightbox
    echo lightBoxModel($readImg, $countImg);

}

// call view of the current page
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.view.php';