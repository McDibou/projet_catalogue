<?php

require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.model.php';

$promo = readPromo($db);
$showId = readShow($db);

$tabId = [];
foreach ( $showId as $id ) {
    $tabId[] = $id['id_article'];
}

$id = array_rand($tabId, 1);
$show = readOneShow($db, $tabId[$id]);


require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.view.php';