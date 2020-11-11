<?php

// call model of the current page
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.model.php';

// read promotion and show
$promoId = readPromo($db);
$showId = readShow($db);

// count promotion and show article used view page
$countPromo = mysqli_num_rows($promoId);
$countShow = mysqli_num_rows($showId);

// if there are articles in show create an array of ids for a random
if ($countShow !== 0) {
    $tabId = [];
    foreach ($showId as $id) {
        $tabId[] = $id['id_article'];
    }

    // select random article
    $id = array_rand($tabId, 1);
    // read show article used view page
    $show = readOneShow($db, $tabId[$id]);
}

// if there are articles in promotion create an array of ids for a random
if ($countPromo !== 0) {
    $tabId = [];
    foreach ($promoId as $id) {
        $tabId[] = $id['id_article'];
    }

    // create string id for condition seleted article
    if (count($tabId) === 1) {
        $tabId = $tabId[0];
    } elseif (count($tabId)  === 2 ) {
        $tabId = $tabId[0] . ',' . $tabId[1];
    } else {
        $Id = array_rand($tabId, 3);
        $tabId = $tabId[$Id[0]] . ',' . $tabId[$Id[1]] . ',' . $tabId[$Id[2]];
    }

    // read promotion article used view page
    $promo = readThreePromo($tabId, $db);

}

// displays the light box of the current article
if (isset($_POST['lightbox'])) {

    // empty the id if different from a number
    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    // read images with a id
    $readImg = readImg($id, $db);
    // count  image recover
    $countImg = mysqli_num_rows($readImg);

    // display lightbox
    echo lightBoxModel($readImg, $countImg);

}

// call view of the current page
require_once dirname(__DIR__,2) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.view.php';