<?php

function readImg($id, $db)
{
return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
}


function createImg($img, $id, $db)
{
return mysqli_query($db, "INSERT INTO `catalog.img` (`name_img`, `fkey_id_article` ) VALUES ( '$img', '$id');");
}
