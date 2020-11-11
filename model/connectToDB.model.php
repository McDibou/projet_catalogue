<?php

// call of the content file all the constants of connection to the database
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'bin' . DIRECTORY_SEPARATOR . 'config.php';

/**
 * is used to connect to the database or to return the error.
 * @return mysqli|false
 */
function connectToDB()
{
    // connection to the database
    $db = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);

    // if connection error returns false
    if (mysqli_connect_errno()) {
        return false;
    }

    // define the charset  for sending and receiving
    mysqli_set_charset($db, DB_CHARSET);
    mysqli_query($db, 'SET NAMES ' . DB_CHARSET );

    return $db;
}