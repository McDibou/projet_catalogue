<?php

function connectToDB(){

$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME, DB_PORT);
mysqli_set_charset($db,DB_CHARSET);
return $db;

}