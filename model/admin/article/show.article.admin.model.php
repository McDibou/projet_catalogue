<?php

/**
 * update a show article
 * @param string $key
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function updateShowArticle( string $key, $id, $db)
{
    return mysqli_query($db, "UPDATE `catalog.article` SET `show_article` = '$key' WHERE `id_article` = '$id';");
}