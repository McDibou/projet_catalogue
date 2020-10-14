<?php


require_once dirname(dirname(dirname(__DIR__))) . DIRECTORY_SEPARATOR . 'model' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'article' . DIRECTORY_SEPARATOR . 'delete.article.admin.model.php';

if (!empty($_POST['article_all_id'])) {

    $id_all = $_POST['article_all_id'];

    foreach ($id_all as $id) {

        if (ctype_digit($id)) {
            $pics = selectImg($id, $db);

            foreach ($pics as $img) {

                $img = $img['name_img'];
                $img = "img/$img";

                if (file_exists($img)) {
                    unlink($img);
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