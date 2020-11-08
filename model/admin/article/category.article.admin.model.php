<?php

function readCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}

function checkedCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}

function updateCategory($category_id, $id, $db)
{
    mysqli_begin_transaction($db);

    $delete = mysqli_query($db, "DELETE FROM `catalog.category_has_article` WHERE `fkey_id_article` = '$id'");

    foreach ($category_id as $value) {
        $insert = mysqli_query($db, "INSERT INTO `catalog.category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$value', '$id')");
    }

    if ($delete && $insert) {
        mysqli_commit($db);
        return true;
    } else {
        mysqli_rollback($db);
        return false;
    }
}