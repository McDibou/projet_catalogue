<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readUser($name_user, $db)
{
    $query = mysqli_query($db, "SELECT * FROM `user` WHERE `name_user` = '$name_user'");
    return mysqli_fetch_assoc($query);
}