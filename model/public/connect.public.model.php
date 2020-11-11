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
 * select a user from his name
 * @param string $name_user
 * @param mysqli|false $db
 * @return string[]|null
 */
function readUser(string $name_user, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.user` WHERE `name_user` = '$name_user'"));
}