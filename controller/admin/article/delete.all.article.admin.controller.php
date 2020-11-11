<?php

// call model of the current page
require_once dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

// delete many article
if (!empty($_POST['article_all_id'])) {

    // create a table of article ids
    $id_all = [];
    if (!empty($_POST['article_all_id'])) {
        foreach ($_POST['article_all_id'] as $data) {
            if (ctype_digit($data)) {
                $id_all[] = $data;
            }
        }
    }

    // browse ids table
    foreach ($id_all as $id) {

        if (ctype_digit($id)) {

            // read image used for delete
            $pics = selectImg($id, $db);

            // browse images table
            foreach ($pics as $img) {

                $img = $img['name_img'];

                // if images exist in the folders, delete them. return bool. if false return `get error` used create controller
                if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
                    unlink('img/original/' . $img);
                    unlink('img/thumb/' . $img);
                } else {
                    header('Location: ?p=create.article.admin&error=1');
                }

            }

            // delete images database, return bool. if false return `get error` used create controller
            if (deleteArticle($id, $db)) {
                header('Location: ?p=create.article.admin');
            } else {
                header('Location: ?p=create.article.admin&error=2');
            }
        }
    }

} else {
    header('Location: ?p=create.article.admin&error=3');
}