<?php

// start session for verify connection
session_start();

// set the timezone to Brussels for time difference
date_default_timezone_set("Europe/Brussels");

// call the file with the connection function
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'connectToDB.model.php';

// call of the file with svg constants useful for displaying icons
require_once __DIR__ . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'constant.svg.php';

// calling files with lightbox for articles and images
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'card.model.php';
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'light.box.model.php';

// assigns the connection function in a variable that will be reused in the site.
$db = connectToDB();

// if the connection variable returns false, call page 404 error
if (!$db) {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . '404.view.php';
    exit();
}

// call the header page containing the doctype and the head
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'header.php';

// calls up the menu page with the menus according to the connection
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'menu.controller.php';

// if the admin is connected, call of the admin front controller otherwise public front controller
if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin.controller.php';
} else {
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public.controller.php';
}

// call the footer page containing the calls of the global js scripts to the site
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'footer.php';