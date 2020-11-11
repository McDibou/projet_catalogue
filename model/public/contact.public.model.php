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
 * select all shop sorted by city
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readShop($db) {
    return mysqli_query($db, "SELECT * FROM `catalog.shop` ORDER BY `ville_shop`");
}

