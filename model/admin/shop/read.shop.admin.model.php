<?php

function readShop($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `shop` WHERE `id_shop` = $id "));
}