<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readModifyCategory($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `category` WHERE `id_category` = '$id'"));
}

function modifyCategory($id, $name_category, $db)
{
    mysqli_query($db, "UPDATE `category` SET `name_category` = '$name_category' WHERE `id_category` = '$id';");
}
