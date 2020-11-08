<?php

function selectImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = $id");
}

function deleteArticle($id, $db)
{
    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $img = mysqli_query($db, "DELETE FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
    $manyArticle = mysqli_query($db, "DELETE FROM `catalog.category_has_article` WHERE `fkey_id_article` = '$id'");
    $article = mysqli_query($db, "DELETE FROM `catalog.article` WHERE `id_article` = '$id'");

    if ($article && $img && $manyArticle) {
        mysqli_commit($db);
        return true;
    } else {
        mysqli_rollback($db);
        return false;
    }
}