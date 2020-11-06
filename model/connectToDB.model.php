<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';

function connectToDB()
{
    $db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    if (mysqli_connect_errno()) {
        return false;
    }

    mysqli_set_charset($db, DB_CHARSET);
    return $db;
}