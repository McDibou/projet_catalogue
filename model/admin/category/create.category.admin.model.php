<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}



function readCategory($db)
{
    return mysqli_query($db, "SELECT * FROM category");
}

function createCategory($name_category, $db)
{
    return mysqli_query($db, "INSERT INTO `category` (`name_category`) VALUES ( '$name_category');");
}