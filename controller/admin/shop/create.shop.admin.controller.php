<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'create.shop.admin.model.php';

$shop = readShop($db);
$countShop = mysqli_num_rows($shop);

if (isset($_POST['create_shop'])) {

    $name_shop = analyseData($_POST['name_shop']);
    $localisation_shop = analyseData($_POST['localisation_shop']);
    $ville_shop = analyseData($_POST['ville_shop']);
    $desc_shop = analyseData($_POST['desc_shop']);


    if (!empty($name_shop) && !empty($localisation_shop) && !empty($ville_shop) && !empty($desc_shop)) {

        if (createShop($db, $name_shop, $localisation_shop, $ville_shop, $desc_shop)) {
            header('Location: ?p=create.shop.admin');
        } else {
            $error_shop = 'the shop could not be created';
        }

    } else {

        $error_shop = 'An error has occurred';

    }
}

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

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'create.shop.admin.view.php';