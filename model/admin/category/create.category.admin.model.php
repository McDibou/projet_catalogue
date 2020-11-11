<?php

/**
 * analyzes incoming data
 * @param mixed $data
 * @return string
 */
function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

/**
 * select all category border by name
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}

/**
 * insert a category
 * @param string $name_category
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function createCategory(string $name_category, $db)
{
    return mysqli_query($db, "INSERT INTO `catalog.category` (`name_category`) VALUES ( '$name_category');");
}