<?php

function deleteCategory($id, $db)
{
    return mysqli_query($db, "DELETE FROM `catalog.category` WHERE `id_category` = '$id'");
}

