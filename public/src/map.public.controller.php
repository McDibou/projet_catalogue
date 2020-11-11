<?php

// file that retrieves all the shop in table form and transforms it into JSON
// file depends on the site so needs to call the connection to the database
// file to use for asynchronous call of shop coordinates

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'map.public.model.php';
$db = connectToDB();

$shop = selectShop($db);
echo json_encode($shop);