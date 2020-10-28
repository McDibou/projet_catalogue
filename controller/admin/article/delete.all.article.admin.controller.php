<?php

require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

if (!empty($_POST['article_all_id'])) {

    $id_all = [];
    if (!empty($_POST['article_all_id'])) {
        foreach ($_POST['article_all_id'] as $data) {
            if (ctype_digit($data)) {
                $id_all[] = $data;
            }
        }
    }

    foreach ($id_all as $id) {

        if (ctype_digit($id)) {

            $pics = selectImg($id, $db);

            foreach ($pics as $img) {

                $img = $img['name_img'];

                if (file_exists('img/original/' . $img) && file_exists('img/thumb/' . $img)) {
                    unlink('img/original/' . $img);
                    unlink('img/thumb/' . $img);
                }

            }

            deleteArticle($id, $db);

        } else {

            header('Location: ?p=create.article.admin');

        }

    }

    header('Location: ?p=create.article.admin');


} else {

    header('Location: ?p=create.article.admin');

}