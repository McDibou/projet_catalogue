<?php

/**
 * select all images with current article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readImg($id, $db)
{
return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
}

/**
 * insert image link to an article
 * @param string $img
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function createImg(string $img, $id, $db)
{
return mysqli_query($db, "INSERT INTO `catalog.img` (`name_img`, `fkey_id_article` ) VALUES ( '$img', '$id');");
}
