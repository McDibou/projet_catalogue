<?php

// call model of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'modify.shop.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.shop.admin');
}

// read shop used view page
$view_modify = readModifyShop($id, $db);

// modify the shop
if (isset($_POST['modify_shop'])) {

    // analyse data
    $name_shop = analyseData($_POST['name_shop']);
    $localisation_shop = analyseData($_POST['localisation_shop']);
    $ville_shop = analyseData($_POST['ville_shop']);
    $desc_shop = analyseData($_POST['desc_shop']);

    // if no field is empty
    if (!empty($id) && !empty($name_shop) && !empty($localisation_shop) && !empty($ville_shop) && !empty($desc_shop)) {

        // function modify shop
        modifyShop($id, $name_shop, $localisation_shop, $ville_shop, $desc_shop, $db);
        // redirection to the create page
        header("Location: ?p=create.shop.admin");

        // else return message error
    } else {
        $error_modify_shop = 'An error has occurred';
    }

}

// call view of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'modify.shop.admin.view.php';