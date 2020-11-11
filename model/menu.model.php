<?php

/**
 * select all categories sorted by name
 * @param $db : connection to the database
 * @return bool|mysqli_result
 */
function readMenuCategory($db)
{
    return mysqli_query($db,  "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}