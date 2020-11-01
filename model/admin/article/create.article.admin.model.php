<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readArticle($db, $limit, $ndrArticle)
{
    return mysqli_query($db, "SELECT * FROM `article` LIMIT $limit, $ndrArticle");
}

function readCountArticle($db)
{
    return mysqli_num_rows(mysqli_query($db, "SELECT * FROM `article`"));
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `category` ORDER BY `name_category` ASC");
}

function readImg($db, $id)
{
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

function resizeThumb($new_name_img, $imgWidth, $imgHeight, $extend, $source = 'img/original/', $dest = 'img/thumb/', $propHeight = 100, $propWidth = 50)
{

    if ($imgWidth > $imgHeight) {
        $proportion = $propHeight / $imgWidth;
    } else {
        $proportion = $propWidth / $imgHeight;
    }

    $endWidth = round($imgWidth * $proportion);
    $endHeight = round($imgHeight * $proportion);

    $background = imagecreatetruecolor($endWidth, $endHeight);
    $whiteBackground = imagecolorallocate($background, 255, 255, 255);
    imagefill($background, 0, 0, $whiteBackground);

    if ($extend == ".jpg" || $extend == ".jpeg") {

        $copy = imagecreatefromjpeg($source . $new_name_img);
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagejpeg($background, $dest . $new_name_img, 90);

    } elseif ($extend == ".png") {
        $copy = imagecreatefrompng($source . $new_name_img);
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagepng($background, $dest . $new_name_img);
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

function randomCreateArticle($nbrArticle, $db)
{
    for ($i = 0; $i < $nbrArticle; $i++) {

        $category = readOptionCategory($db);

        $tab_category = [];
        foreach ($category as $cat) {
            $name_img = PICTURE[$cat['name_category']][array_rand(PICTURE[$cat['name_category']], 1)];

            $tab_category[$cat['name_category']] = [strtoupper(substr($cat['name_category'], 0, 2)), $cat['id_category'], $name_img];
        }

        $key_taille = array_rand(TAILLE, 1);
        $key_category = array_rand($tab_category, 1);

        $id_category = $tab_category[$key_category][1];

        $nbr = mt_rand(0, 99);
        $number = (strlen((string)$nbr) === 1) ? '0' . $nbr : $nbr;
        $title_article = TAILLE[$key_taille][0] . '' . $tab_category[$key_category][0] . ' ' . $number;

        $price_article = mt_rand(TAILLE[$key_taille][1][0], TAILLE[$key_taille][1][1]) . '.99';


        $content_article = 'Frets : ' . DESC['Frets'][mt_rand(0, count(DESC['Frets']) - 1)] . '
Color body : ' . DESC['Color body'][mt_rand(0, count(DESC['Color body']) - 1)] . '
Size : ' . DESC['Size'][mt_rand(0, count(DESC['Size']) - 1)] . '
Wood : ' . DESC['Wood'][mt_rand(0, count(DESC['Wood']) - 1)];

        $promo_article = '';
        $date_promo_article = '';

        $luck_promo = mt_rand(1, 10);
        if ($luck_promo === 1) {

            $rand = array_rand(REDUCE, 1);
            $promo_article = REDUCE[$rand];

            $date_promo = mt_rand(1, 20);
            $date_promo_article = date('Y-m-d H:i:s', strtotime('+' . $date_promo . ' day'));

        }

        $luck_show = mt_rand(1, 12);
        $show_article = ($luck_show === 1) ? 1 : 0;

        $name_img = $tab_category[$key_category][2];
        $new_name_img = date('U') . '_' . mt_rand(10000, 99999) . '.png';

        copy('img/src/' . $name_img, 'img/original/' . $name_img);
        rename('img/original/' . $name_img, 'img/original/' . $new_name_img);

        resizeThumb($new_name_img, $imgWidth = 267, $imgHeight = 400, '.png', 'img/original/', 'img/thumb/');

        mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

        $article = mysqli_query($db, "INSERT INTO `article` ( `title_article`, `price_article`, `promo_article`, `show_article`, `date_article`, `date_promo_article`, `content_article` ) VALUES ('$title_article', '$price_article', '$promo_article','$show_article', NOW(), '$date_promo_article', '$content_article');");

        $id_article = mysqli_insert_id($db);

        $img = mysqli_query($db, "INSERT INTO `img` ( `name_img`, `fkey_id_article`) VALUES ( '$new_name_img', '$id_article');");
        $category = mysqli_query($db, "INSERT INTO `category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$id_category', '$id_article')");

        if ($article && $img && $category) {
            mysqli_commit($db);
        } else {
            mysqli_rollback($db);
        }
    }

}

function switchArticle($countArticle, $currentPage, $ndrArticle)
{
    $outRead = "";
    $numberPage = ceil($countArticle / $ndrArticle);

    if ($numberPage < 2) return $outRead;

    $outRead .= "<ul class='pagination'>";

    for ($i = 1; $i <= $numberPage; $i++) {
        if ($i == 1) {
            if ($i != $currentPage) {
                $outRead .= "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage - 1) . "'><span aria-hidden='true'>&laquo;</span></a></li>";
            }
        };
        $outRead .= ($i == $currentPage) ? "<li class='page-item disabled'><a class='page-link'>$i</a></li>" : "<a class='page-link' href='?p=create.article.admin&switch=$i'>$i</a>";

        if ($numberPage == $i) {

            if ($currentPage != $i) {
                $outRead .= "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage + 1) . "'><span aria-hidden='true'>&raquo;</span></a></li>";
            }
        }
    }

    $outRead .= "</div>";
    return $outRead;
}