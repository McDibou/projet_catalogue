<?php

session_start();
date_default_timezone_set("Europe/Brussels");

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';

ob_start();

$db = connectToDB();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'menu.controller.php';

if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) {

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin.controller.php';

} else {

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public.controller.php';

}