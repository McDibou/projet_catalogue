<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.model.php';

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
$min = !empty($_GET['min']) && ctype_digit($_GET['min']) ? analyseData($_GET['min']) : $priceMin ;
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

            $article = readGlobalArticle($db, $where, $limit, $ndrArticle);


        }

    } else {

        $article = readGlobalArticle($db, $where, $limit, $ndrArticle);

    }

} else {

    $article = readGlobalArticle($db, $where, $limit, $ndrArticle);

}

if (!empty($category)) {
    $countArticle = countWithArticle($db, $where);
} else {
    $countArticle = countArticle($db, $where);
}

if ($countArticle === 0) {
    $message = 'NOT FOUND !';
}

$switch = switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max);


if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readArticle = readOneShow($db, $id);
    $readImg = readImg($readArticle['id_article'], $db); ?>

    <div class="light-box">
        <div class="box">

            <?php foreach ($readImg as $img) : ?>
                <div class="slidebox" style="display: none;">
                    <img src="img/original/<?= $img['name_img'] ?>">
                </div>
            <?php endforeach; ?>

            <a class="prev" onclick="sliderBox(-1)">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-caret-down-fill"
                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
            </a>
            <a class="next" onclick="sliderBox(1)">
                <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-caret-up-fill"
                     fill="currentColor">
                    <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                </svg>
            </a>

            <div class="view-slide">
                <?php foreach ($readImg as $key => $img) : ?>
                    <img onclick="currentSlide(<?= $key ?>)" src="img/original/<?= $img['name_img'] ?>">
                <?php endforeach; ?>
            </div>

            <a class="back-box" href="" onclick="history.go(-1)">
                <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-x-square-fill" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                </svg>
            </a>

        </div>
    </div>

<?php }

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.view.php';