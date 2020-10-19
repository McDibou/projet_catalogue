<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function createPromo($db, $date_promo, $promo_article, $id)
{
    mysqli_query($db, "UPDATE `article` SET `promo_article` = '$promo_article', `date_promo_article` = '$date_promo' WHERE `id_article` = $id;");
}

function readPromo($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` WHERE `id_article` = $id"));
}