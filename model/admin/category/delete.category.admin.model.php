<?php

function deleteCategory($id, $db)
{
    return mysqli_query($db, "DELETE FROM category WHERE id_category = '$id'");
}

