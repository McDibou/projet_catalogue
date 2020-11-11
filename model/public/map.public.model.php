<?php


/**
 * select all shops
 * @param mysqli|false $db
 * @return array
 */
function selectShop($db)
{
    return mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `catalog.shop`"));
}
