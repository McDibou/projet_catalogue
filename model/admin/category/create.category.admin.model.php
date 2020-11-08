<?php

function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

function readCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}

function createCategory($name_category, $db)
{
    return mysqli_query($db, "INSERT INTO `catalog.category` (`name_category`) VALUES ( '$name_category');");
}