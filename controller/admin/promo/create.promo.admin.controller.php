<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'create.promo.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

$readPromo = readPromo($db, $id);

if (isset($_POST['create_promo'])) {


    $promo_article = ctype_digit(analyseData($_POST['promo_article'])) ? $_POST['promo_article'] : NULL;
    $date_promo = ctype_digit(analyseData($_POST['date_promo'])) ? $_POST['date_promo'] : NULL;
    $date_promo = date('Y-m-d H:i:s', strtotime('+' . $date_promo . ' day'));

    if (!empty($date_promo) && !empty($promo_article)) {

        createPromo($db, $date_promo, $promo_article, $id);
        header('Location: ?p=create.article.admin');

    } else {

        $error_create_promo = 'error_create_promo';

    }
}

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'create.promo.admin.view.php';