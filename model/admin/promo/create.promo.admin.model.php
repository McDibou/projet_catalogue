<?php

/**
 * analyzes incoming data
 * @param mixed $data
 * @return string
 */
function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

/**
 * update the promotion from a article
 * @param mysqli|false $db
 * @param string $date_promo
 * @param number $promo_article
 * @param number $id
 * @return bool|mysqli_result
 */
function createPromo($db, string $date_promo, $promo_article, $id)
{
    return mysqli_query($db, "UPDATE `catalog.article` SET `promo_article` = '$promo_article', `date_promo_article` = '$date_promo' WHERE `id_article` = $id;");
}

/**
 * select a article
 * @param mysqli|false $db
 * @param number $id
 * @return string[]|null
 */
function readPromo($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `id_article` = $id"));
}