<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'show.article.admin.model.php';

$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';
$show = isset($_GET['show']) && ctype_digit($_GET['show']) ? $_GET['show'] : '';

if (empty($id) || empty($show)) {
    header('Location: ?p=create.article.admin');
}

if ($show === '1') {
    if (updateShowArticle('0', $id, $db)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=4');
    }
}

if ($show === '0') {
    if (updateShowArticle('1', $id, $db)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'].'&error=4');
    }
}