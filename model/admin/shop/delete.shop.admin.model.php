<?php


function deleteShop($id, $db)
{
    mysqli_query($db, "DELETE FROM `shop` WHERE `id_shop` = '$id'");
}