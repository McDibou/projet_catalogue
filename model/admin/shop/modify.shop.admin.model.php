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
 * select a shop
 * @param number $id
 * @param mysqli|false $db
 * @return string[]|null
 */
function readModifyShop($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.shop` WHERE `id_shop` = '$id'"));
}

/**
 * update a shop
 * @param number $id
 * @param string $name_shop
 * @param string $localisation_shop
 * @param string $ville_shop
 * @param string $desc_shop
 * @param mysqli|false $db
 */
function modifyShop($id, string $name_shop, string $localisation_shop, string $ville_shop, string $desc_shop, $db)
{
    mysqli_query($db, "UPDATE `catalog.shop` SET `name_shop` = '$name_shop', `localisation_shop` = '$localisation_shop', `ville_shop` = '$ville_shop', `desc_shop` = '$desc_shop' WHERE `id_shop` = $id;");
}