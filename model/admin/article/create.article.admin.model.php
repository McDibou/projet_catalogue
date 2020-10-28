<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readArticle($db)
{
    return mysqli_query($db, "SELECT * FROM `article` ORDER BY `date_article`");
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `category`");
}

function readImg($db, $id) {
    return mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = $id");
}

function readCategoryArticle($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `category` JOIN `category_has_article` ON `id_category` = `fkey_id_category` JOIN  `article` ON `id_article` = `fkey_id_article` WHERE `id_article` = $id");
}

function createArticle($title_article, $price_article, $category_id, $content_article, $img_article, $db)
{

    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $article = mysqli_query($db, "INSERT INTO `article` ( `title_article`, `price_article`, `show_article`, `date_article`, `content_article` ) VALUES ( '$title_article', '$price_article', '0', NOW(), '$content_article');");

    $id_article = mysqli_insert_id($db);

    foreach ($category_id as $value) {
        mysqli_query($db, "INSERT INTO `category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$value', '$id_article')");
    }

    $img = mysqli_query($db, "INSERT INTO `img` ( `name_img`, `fkey_id_article`) VALUES ( '$img_article', '$id_article');");

    if ($article && $img) {
        return mysqli_commit($db);
    } else {
        return mysqli_rollback($db);
    }

}

function resizeThumb($new_name_img, $imgWidth, $imgHeight, $extend)
{

    if ($imgWidth > $imgHeight) {
        $proportion = 100 / $imgWidth;
    } else {
        $proportion = 50 / $imgHeight;
    }

    $endWidth = round($imgWidth * $proportion);
    $endHeight = round($imgHeight * $proportion);

    $new_thumb_img = imagecreatetruecolor($endWidth, $endHeight);

    if ($extend == ".jpg" || $extend == ".jpeg") {

        $copy = imagecreatefromjpeg('img/original/' . $new_name_img);
        imagecopyresampled($new_thumb_img, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagejpeg($new_thumb_img, 'img/thumb/' . $new_name_img, 90);

    } elseif ($extend == ".png") {
        $copy = imagecreatefrompng('img/original/' . $new_name_img);
        imagecopyresampled($new_thumb_img, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagepng($new_thumb_img, 'img/thumb/' . $new_name_img);
    }

}

function uploadImg(array $name_file)
{
    if ($name_file['error'] == 0) {

        if (in_array(strtolower(strrchr($name_file['name'], ".")), [".jpg", ".jpeg", ".png"])) {

            if ($name_file['size'] < 10000000) {

                $imgSize = getimagesize($name_file['tmp_name']);
                $imgWidth = $imgSize[0];
                $imgHeight = $imgSize[1];

                if ($imgWidth < 800 && $imgHeight < 600) {
                    $new_name_img = date('U') . '_' . mt_rand(10000, 99999) . strtolower(strrchr($name_file['name'], "."));

                    if (move_uploaded_file($name_file['tmp_name'], 'img/original/' . $new_name_img)) {

                        resizeThumb($new_name_img, $imgWidth, $imgHeight, strtolower(strrchr($name_file['name'], ".")));

                        return [$new_name_img];
                    } else {
                        return 'echec upload';
                    }
                } else {
                    return 'echec echelle';
                }
            } else {
                return 'echec size';
            }
        } else {
            return 'echec type';
        }
    } else {
        return 'echec error';
    }
}