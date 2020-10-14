<?php

function deleteImg($id, $db)
{
    return mysqli_query($db, "DELETE FROM `img` WHERE `id_img` = '$id'");
}

function selectIdArticle($id, $db)
{
    $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT `id_article` FROM `article` JOIN `img` ON `id_article` = `fkey_id_article` WHERE `id_img` = '$id'"));
    return $result['id_article'];
}

function selectImg($id, $db) {
    $name = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `img` WHERE `id_img` = $id"));
    return $name['name_img'];
}