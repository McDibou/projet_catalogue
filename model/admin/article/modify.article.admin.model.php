<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readModifyArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'"));
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `category`");
}

function modifyArticle($id, $title_article, $price_article, $promo_article, $category_id, $content_article, $db)
{
    mysqli_query($db, "UPDATE `article` SET `title_article` = '$title_article', `price_article` = '$price_article', `promo_article` = '$promo_article', `date_article` = NOW(), `content_article` = '$content_article',`category_id_category` = '$category_id' WHERE `article`.`id_article` = '$id';");
}