<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'card.model.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'light.box.model.php';

$promoId = readPromo($db);
$showId = readShow($db);

$countPromo = mysqli_num_rows($promoId);
$countShow = mysqli_num_rows($showId);

if ($countShow !== 0) {
    $tabId = [];
    foreach ($showId as $id) {
        $tabId[] = $id['id_article'];
    }

    $id = array_rand($tabId, 1);
    $show = readOneShow($db, $tabId[$id]);
}

if ($countPromo !== 0) {
    $tabId = [];
    foreach ($promoId as $id) {
        $tabId[] = $id['id_article'];
    }

    $Id = array_rand($tabId, 3);
    $tabId = $tabId[$Id[0]] . ',' . $tabId[$Id[1]] . ',' . $tabId[$Id[2]];
    $promo = readThreePromo($tabId, $db);

}

if (isset($_POST['lightbox'])) {

    $id = isset($_POST['id_article']) && ctype_digit($_POST['id_article']) ? $_POST['id_article'] : '';
    $readImg = readImg($id, $db);
    $countImg = mysqli_num_rows($readImg);

    echo lightBoxModel($readImg, $countImg);

}

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.view.php';