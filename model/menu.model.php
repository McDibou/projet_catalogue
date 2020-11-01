<?php

function readMenuCategory($db)
{
    return mysqli_query($db,  "SELECT * FROM `category` ORDER BY `name_category` ASC");
}