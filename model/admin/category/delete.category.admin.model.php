<?php

/**
 * delete a category
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function deleteCategory($id, $db)
{
    return mysqli_query($db, "DELETE FROM `catalog.category` WHERE `id_category` = '$id'");
}

