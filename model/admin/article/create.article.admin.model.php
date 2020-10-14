<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readArticle($db)
{
    return mysqli_query($db, "SELECT * FROM `article` ORDER BY `date_article`");
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `category`");
}

function readCategoryArticle($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `category` JOIN `category_has_article` ON `id_category` = `fkey_id_category` JOIN  `article` ON `id_article` = `fkey_id_article` WHERE `id_article` = $id");
}

function createArticle($title_article, $price_article, $promo_article, $category_id, $content_article, $img_article, $date_promo, $db)
{

    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $article = mysqli_query($db, "INSERT INTO `article` ( `title_article`, `price_article`, `promo_article`, `show_article`, `date_article`,`date_promo_article`, `content_article` ) VALUES ( '$title_article', '$price_article', '$promo_article', '0', NOW(), '$date_promo', '$content_article');");

    $id_article = mysqli_insert_id($db);

    foreach ($category_id as $value) {
        mysqli_query($db, "INSERT INTO `category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$value', '$id_article')");
    }

    $img = mysqli_query($db, "INSERT INTO `img` ( `name_img`, `fkey_id_article`) VALUES ( '$img_article', '$id_article');");

    if ($article && $img) {
        return mysqli_commit($db);
    } else {
        return mysqli_rollback($db);
    }

}