<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readShop($db)
{
    return mysqli_query($db, "SELECT * FROM `shop`");
}

function createShop($db, $name_shop, $localisation_shop, $ville_shop, $desc_shop)
{
    mysqli_query($db, "INSERT INTO `shop` ( `name_shop`, `localisation_shop`, `ville_shop`, `desc_shop` ) VALUES ( '$name_shop', '$localisation_shop', '$ville_shop', '$desc_shop');");
}