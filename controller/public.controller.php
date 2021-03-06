<?php
// public front controller

// if element get `p` does not exist
if (!isset($_GET['p'])) {

    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.controller.php';

} else {

    // else create `switch` to create navigation
    switch ($_GET['p']) {

        case 'catalog.public':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'catalog.public.controller.php';
            break;
        case 'aboutus.public':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'aboutus.public.controller.php';
            break;
        case 'contact.public':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'contact.public.controller.php';
            break;
        case 'connect.public':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'connect.public.controller.php';
            break;
        case 'read.article.public':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'read.article.public.controller.php';
            break;
        default :
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . '404.view.php';

    }
}