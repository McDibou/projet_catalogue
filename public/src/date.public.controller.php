<?php

// file that retrieves all the articles in table form and transforms it into JSON
// file depends on the site so needs to call the connection to the database
// file used for asynchronous call to check if the articles are on promotion.

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'date.public.model.php';
$db = connectToDB();

$article = selectDate($db);
echo JSON_encode($article);