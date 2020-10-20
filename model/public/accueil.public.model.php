<?php

function readPromo($db) {
    return mysqli_query($db, "SELECT * FROM `article` WHERE `date_promo_article` > NOW() LIMIT 3");
}

function readShow($db) {
    return mysqli_query($db, "SELECT * FROM `article` WHERE `show_article` != 0 LIMIT 1");
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = '$id'");
}

function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}