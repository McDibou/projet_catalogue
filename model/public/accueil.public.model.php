<?php

function readPromo($db) {
    return mysqli_query($db, "SELECT * FROM `article` WHERE `promo_article` != 0 LIMIT 3");
}

function readShow($db) {
    return mysqli_query($db, "SELECT * FROM `article` WHERE `show_article` != 0 LIMIT 1");
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = '$id'");
}