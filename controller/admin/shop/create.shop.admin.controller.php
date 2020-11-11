<?php

// call model of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'create.shop.admin.model.php';

// read shop and count shop used view page
$shop = readShop($db);
$countShop = mysqli_num_rows($shop);

// create a shop
if (isset($_POST['create_shop'])) {

    // analyse data
    $name_shop = analyseData($_POST['name_shop']);
    $localisation_shop = analyseData($_POST['localisation_shop']);
    $ville_shop = analyseData($_POST['ville_shop']);
    $desc_shop = analyseData($_POST['desc_shop']);

    // if no field is empty
    if (!empty($name_shop) && !empty($localisation_shop) && !empty($ville_shop) && !empty($desc_shop)) {

        // cerate shop, return bool. if false return message error
        if (createShop($db, $name_shop, $localisation_shop, $ville_shop, $desc_shop)) {
            header('Location: ?p=create.shop.admin');
        } else {
            $error_shop = 'the shop could not be created';
        }

    } else {
        $error_shop = 'An error has occurred';
    }
}

// switch error delete shop
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_message = 'The shop could not be deleted';
            break;
        case 2 :
            $error_message = 'An error has occurred';
            break;
    }
}

// call view of the current page
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'create.shop.admin.view.php';