<?php

/**
 * delete a images
 * @param number $id
 * @param mysqli|false  $db
 * @return bool|mysqli_result
 */
function deleteImg($id, $db)
{
    return mysqli_query($db, "DELETE FROM `catalog.img` WHERE `id_img` = '$id'");
}


/**
 * select the article id with the current image
 * @param number $id
 * @param mysqli|false  $db
 * @return mixed|string
 */
function selectIdArticle($id, $db)
{
    $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id_article` FROM `catalog.article` JOIN `catalog.img` ON `id_article` = `fkey_id_article` WHERE `id_img` = '$id'"));
    return $result['id_article'];
}

/**
 * select a images
 * @param number $id
 * @param mysqli|false  $db
 * @return mixed|string
 */
function selectImg($id, $db) {
    $name = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `id_img` = $id"));
    return $name['name_img'];
}