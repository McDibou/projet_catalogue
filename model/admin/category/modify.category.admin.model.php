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
 * select a category
 * @param number $id
 * @param mysqli|false $db
 * @return string[]|null
 */
function readModifyCategory($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.category` WHERE `id_category` = '$id'"));
}

/**
 * update a category
 * @param number $id
 * @param string $name_category
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function modifyCategory($id, string $name_category, $db)
{
    return mysqli_query($db, "UPDATE `catalog.category` SET `name_category` = '$name_category' WHERE `id_category` = '$id';");
}
