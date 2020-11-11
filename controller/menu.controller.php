<?php

// call model of the current page
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'menu.model.php';

// read article for public menu
$category_home = readMenuCategory($db);

// call view of the current page
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR  . 'menu.view.php';