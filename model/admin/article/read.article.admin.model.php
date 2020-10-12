<?php

function readArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'"));
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` JOIN `article` ON `id_article` = `fkey_id_article` WHERE `id_article` = $id ");
}