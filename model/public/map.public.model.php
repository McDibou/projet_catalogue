<?php

function selectShop($db)
{
    return mysqli_fetch_all(mysqli_query($db, "SELECT * FROM `catalog.shop`"));
}
