<?php

// call model of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'delete.shop.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id not empty
if (!empty($id)) {

    // delete shop, return bool. if false return `get error` used create controller
    if (deleteShop($id, $db)) {
        header('Location: ?p=create.shop.admin');
    } else {
        header('Location: ?p=create.shop.&error=1');
    }

} else {
    header('Location: ?p=create.shop.admin&error=2');
}