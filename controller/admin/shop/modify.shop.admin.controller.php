<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'modify.shop.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.shop.admin');
}

$view_modify = readModifyShop($id, $db);

if (isset($_POST['modify_shop'])) {

    $name_shop = analyseData($_POST['name_shop']);
    $localisation_shop = analyseData($_POST['localisation_shop']);
    $ville_shop = analyseData($_POST['ville_shop']);
    $desc_shop = analyseData($_POST['desc_shop']);

    if (!empty($id) && !empty($name_shop) && !empty($localisation_shop) && !empty($ville_shop) && !empty($desc_shop)) {

        modifyArticle($id, $name_shop, $localisation_shop, $ville_shop, $desc_shop, $db);
        header("Location: ?p=create.shop.admin");

    } else {

        $error_modify_shop = 'error_modify_shop';

    }

}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'modify.shop.admin.view.php';