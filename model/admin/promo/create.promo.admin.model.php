<?php

function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

function createPromo($db, $date_promo, $promo_article, $id)
{
    return mysqli_query($db, "UPDATE `catalog.article` SET `promo_article` = '$promo_article', `date_promo_article` = '$date_promo' WHERE `id_article` = $id;");
}

function readPromo($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `id_article` = $id"));
}