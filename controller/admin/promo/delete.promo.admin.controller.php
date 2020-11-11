<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'delete.promo.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id not empty
if (!empty($id)) {

    // delete shop, return bool. if false return `get error` used create controller
    if (deletePromo($id, $db)) {
        header('Location: ?p=create.article.admin');
    } else {
        header('Location: ?p=create.article.admin&error=1');
    }

} else {
    header('Location: ?p=create.article.admin&error=2');
}

