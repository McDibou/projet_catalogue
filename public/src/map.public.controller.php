<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'map.public.model.php';
$db = connectToDB();

$shop = selectShop($db);
echo json_encode($shop);