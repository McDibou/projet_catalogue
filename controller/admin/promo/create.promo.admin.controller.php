<?php

// call model of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'create.promo.admin.model.php';

// check if the get id is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';

// if id empty, redirection to the create page
if (empty($id)) {
    header('Location: ?p=create.article.admin');
}

// read promotion used view page
$readPromo = readPromo($db, $id);

//// create promotion
if (isset($_POST['create_promo'])) {

    // analyse data
    $promo_article = ctype_digit(analyseData($_POST['promo_article'])) ? $_POST['promo_article'] : NULL;
    $date_promo = ctype_digit(analyseData($_POST['date_promo'])) ? $_POST['date_promo'] : NULL;
    $date_promo = date('Y-m-d H:i:s', strtotime('+' . $date_promo . ' day'));

    // if no field is empty
    if (!empty($date_promo) && !empty($promo_article)) {

        // create promotion, return bool. if false return message error
        if(createPromo($db, $date_promo, $promo_article, $id)) {
            header('Location: ?p=create.article.admin');
        } else {
            $error_create_promo = 'The promotion could not be created';
        }

    } else {
        $error_create_promo = 'An error has occurred';
    }
}

// switch error delete promotion
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_create_img = 'The promotion could not be deleted';
            break;
        case 2 :
            $error_create_img = 'An error has occurred';
            break;
    }
}

// call view of the current page
require_once dirname(__DIR__,3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'create.promo.admin.view.php';