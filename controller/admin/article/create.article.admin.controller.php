<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.model.php';
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'upload.img.admin.model.php';

// if the `get switch` exists, replace the $currentPage variable
if (isset($_GET['switch']) && ctype_digit($_GET['switch'])) {
    $currentPage = (int)$_GET['switch'];
} else {
    $currentPage = 1;
}

// limit number article by page
$ndrArticle = 10;
// stores the number where starts the limit for the request sql
$limit = ($currentPage - 1) * $ndrArticle;

// count all article used pagination
$totArticle = readCountArticle($db);

// read article and read category used view page
$article = readArticle($db, $limit, $ndrArticle);
$category = readOptionCategory($db);

// count article and category used view page
$countArticle = ($article !== false) ? mysqli_num_rows($article) : 0;
$countCategory = ($category !== false) ? mysqli_num_rows($category) : 0;

// read pagination used view page
$switchArticle = switchArticle($totArticle, $currentPage, $ndrArticle);

// create article
if (isset($_POST['create_article'])) {

    // analyse data
    $title_article = analyseData($_POST['title_article']);
    $price_article = analyseData($_POST['price_article']);
    $content_article = analyseData($_POST['content_article']);

    // create a table of category ids
    $category_id = [];
    if (!empty($_POST['category_id'])) {
        foreach ($_POST['category_id'] as $data) {
            if (ctype_digit($data)) {
                $category_id[] = $data;
            }
        }
    }

    // if no field is empty
    if (!empty($title_article) && !empty($price_article) && !empty($category_id) && !empty($content_article)) {

        if (!empty($_FILES['name_img'])) {

            // add file images to dir
            $img_article = uploadImg($_FILES['name_img']);

            // create images to databases, if false, return message error
            if (is_array($img_article)) {
                createArticle($title_article, $price_article, $category_id, $content_article, $img_article[0], $db);
                header('Location: ?p=create.article.admin');
            } else {
                $error_create_article = $img_article;
            }

        } else {
            $error_create_article = 'An error has occurred';
        }

    } else {
        $error_create_article = 'Please fill in all fields correctly';
    }

}

// switch error delete category
if (!empty($_GET['error'])) {
    switch ($_GET['error']) {
        case 1 :
            $error_message = 'The deletion of failed images';
            break;
        case 2 :
            $error_message = 'Deletion has failed';
            break;
        case 3 :
            $error_message = 'Please select multiple fields';
            break;
        case 4 :
            $error_message = 'An error has occurred';
            break;
    }
}

// call view of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'create.article.admin.view.php';