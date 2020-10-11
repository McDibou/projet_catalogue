<?php

function updateShowArticle($key, $id, $db)
{
    return mysqli_query($db, "UPDATE `article` SET `show_article` = '$key' WHERE `id_article` = '$id';");
}