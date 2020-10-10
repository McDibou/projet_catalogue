<?php


function readImg($id, $db)
{
return mysqli_query($db, "SELECT * FROM img WHERE article_id_article = '$id'");
}


function createImg($img,$id, $db)
{
return mysqli_query($db, "INSERT INTO `img` (`name_img`, `article_id_article` ) VALUES ( '$img', '$id');");
}