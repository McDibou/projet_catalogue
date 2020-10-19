<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readModifyArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'"));
}

function modifyArticle($id, $title_article, $price_article, $content_article, $db)
{
    mysqli_query($db, "UPDATE `article` SET `title_article` = '$title_article', `price_article` = '$price_article', `content_article` = '$content_article' WHERE `id_article` = $id;");
}