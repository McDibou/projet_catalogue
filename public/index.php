<?php

session_start();
//session_destroy();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';

ob_start();

$db = connectToDB();

if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) {

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin.controller.php';

} else {

    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public.controller.php';

}