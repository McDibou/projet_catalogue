<?php

function readMenuCategory($db)
{
    return mysqli_query($db,  "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}