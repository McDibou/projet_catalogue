<?php
require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'show.article.admin.model.php';

// check if the get id and get show is an integer else the empty space
$id = isset($_GET['id']) && ctype_digit($_GET['id']) ? $_GET['id'] : '';
$show = isset($_GET['show']) && ctype_digit($_GET['show']) ? $_GET['show'] : '';

// if id and show empty, redirection to the create page
if (empty($id) || empty($show)) {
    header('Location: ?p=create.article.admin');
}


// if the article is show invert status
if ($show === '1') {

    // modify show article and redirection previous page, return bool. if false, redirection previous page with get error
    if (updateShowArticle('0', $id, $db)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=4');
    }
}

// if the article is not show invert status
if ($show === '0') {

    // modify show article and redirection previous page, return bool. if false, redirection previous page with get error
    if (updateShowArticle('1', $id, $db)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: ' . $_SERVER['HTTP_REFERER'] . '&error=4');
    }
}