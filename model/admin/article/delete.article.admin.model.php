<?php

function deleteArticle($id, $db)
{
    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $img = mysqli_query($db, "DELETE FROM `img` WHERE `fkey_id_article` = '$id'");
    $manyArticle = mysqli_query($db, "DELETE FROM `category_has_article` WHERE `fkey_id_article` = '$id'");
    $article = mysqli_query($db, "DELETE FROM `article` WHERE `id_article` = '$id'");


    if ($article && $img && $manyArticle) {
        mysqli_commit($db);
    } else {
        mysqli_rollback($db);
    }
}
