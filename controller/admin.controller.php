<?php

if (!isset($_GET['p'])) {

    include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'accueil.public.controller.php';

} else {

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

        case 'create.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.controller.php';
            break;
        case 'modify.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'modify.article.admin.controller.php';
            break;
        case 'read.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'read.article.admin.controller.php';
            break;
        case 'delete.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.controller.php';
            break;
        case 'delete.all.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.all.article.admin.controller.php';
            break;
        case 'show.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'show.article.admin.controller.php';
            break;
        case 'category.article.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'category.article.admin.controller.php';
            break;

        case 'create.category.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'create.category.admin.controller.php';
            break;
        case 'modify.category.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'modify.category.admin.controller.php';
            break;
        case 'delete.category.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'category' . DIRECTORY_SEPARATOR . 'delete.category.admin.controller.php';
            break;

        case 'create.img.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'create.img.admin.controller.php';
            break;
        case 'delete.img.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'delete.img.admin.controller.php';
            break;

        case 'create.promo.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'create.promo.admin.controller.php';
            break;
        case 'delete.promo.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'promo' . DIRECTORY_SEPARATOR . 'delete.promo.admin.controller.php';
            break;

        case 'create.shop.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'create.shop.admin.controller.php';
            break;
        case 'modify.shop.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'modify.shop.admin.controller.php';
            break;
        case 'delete.shop.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'shop' . DIRECTORY_SEPARATOR . 'delete.shop.admin.controller.php';
            break;

        case 'disconnect.admin':
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'controller' . DIRECTORY_SEPARATOR . 'disconnect.admin.controller.php';
            break;

        default :
            include dirname(__DIR__) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . '404.view.php';

    }
}

$content = ob_get_clean();

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . 'default.php';
