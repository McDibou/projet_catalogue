<?php

/**
 * delete a shop
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function deleteShop($id, $db)
{
    return mysqli_query($db, "DELETE FROM `catalog.shop` WHERE `id_shop` = '$id'");
}