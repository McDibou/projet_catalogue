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
 * select all shops
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readShop($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.shop`");
}

/**
 * insert a shop
 * @param mysqli|false $db
 * @param string $name_shop
 * @param string $localisation_shop
 * @param string $ville_shop
 * @param string $desc_shop
 * @return bool|mysqli_result
 */
function createShop($db, string $name_shop, string $localisation_shop, string $ville_shop, string $desc_shop)
{
    return mysqli_query($db, "INSERT INTO `catalog.shop` ( `name_shop`, `localisation_shop`, `ville_shop`, `desc_shop` ) VALUES ( '$name_shop', '$localisation_shop', '$ville_shop', '$desc_shop');");
}