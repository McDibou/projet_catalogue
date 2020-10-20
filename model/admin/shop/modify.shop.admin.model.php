<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readModifyShop($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `shop` WHERE `id_shop` = '$id'"));
}

function modifyArticle($id, $name_shop, $localisation_shop, $ville_shop, $desc_shop, $db)
{
    mysqli_query($db, "UPDATE `shop` SET `name_shop` = '$name_shop', `localisation_shop` = '$localisation_shop', `ville_shop` = '$ville_shop', `desc_shop` = '$desc_shop' WHERE `id_shop` = $id;");
}