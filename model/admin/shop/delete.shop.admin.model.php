<?php


function deleteShop($id, $db)
{
    return mysqli_query($db, "DELETE FROM `catalog.shop` WHERE `id_shop` = '$id'");
}