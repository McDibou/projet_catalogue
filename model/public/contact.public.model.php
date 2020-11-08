<?php

function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

function readShop($db) {
    return mysqli_query($db, "SELECT * FROM `catalog.shop` ORDER BY `ville_shop`");
}

