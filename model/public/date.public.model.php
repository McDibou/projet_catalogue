<?php

function selectDate($db)
{
    return mysqli_fetch_all(mysqli_query($db, "SELECT * FROM article"));
}
