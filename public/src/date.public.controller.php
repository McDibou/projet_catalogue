<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR .'date.public.model.php';
$db = connectToDB();

$article = selectDate($db);
echo JSON_encode($article);