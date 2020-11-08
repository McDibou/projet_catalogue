<?php

function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

function readModifyCategory($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.category` WHERE `id_category` = '$id'"));
}

function modifyCategory($id, $name_category, $db)
{
    return mysqli_query($db, "UPDATE `catalog.category` SET `name_category` = '$name_category' WHERE `id_category` = '$id';");
}
