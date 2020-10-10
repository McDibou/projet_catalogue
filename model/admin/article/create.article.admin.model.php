<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readArticle($db)
{
    return mysqli_query($db, "SELECT * FROM article JOIN category ON id_category = category_id_category ORDER BY date_article");
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM category");
}

function createArticle($title_article, $price_article, $promo_article, $category_id, $content_article, $img_article, $db)
{
    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $article = mysqli_query($db, "INSERT INTO `article` ( `title_article`, `price_article`, `promo_article`, `show_article`, `date_article`, `content_article`, `category_id_category`) VALUES ( '$title_article', '$price_article', '$promo_article', '0', NOW(), '$content_article', '$category_id');");

    $id_article = mysqli_insert_id($db);

    $img = mysqli_query($db, "INSERT INTO `img` ( `name_img`, `article_id_article`) VALUES ( '$img_article', '$id_article');");

    if ($article && $img) {
        return mysqli_commit($db);
    } else {
        return mysqli_rollback($db);
    }

}