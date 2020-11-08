<?php

const PICTURE = [
    'folk' => ['guitdev.folk.1.png'],
    'acoustic' => ['guitdev.acoustic.1.png', 'guitdev.acoustic.2.png'],
    'electric' => ['guitdev.electric.1.png', 'guitdev.electric.2.png', 'guitdev.electric.3.png'],
    'electro acoustic' => ['guitdev.electro.acoustic.1.png', 'guitdev.electro.acoustic.2.png'],
    'ukulele' => ['guitdev.ukulele.1.png'],
];

const TAILLE = [
    'little' => ['L', [200, 400]],
    'medium' => ['M', [400, 800]],
    'hight' => ['H', [800, 1200]],
    'xtrem' => ['X', [1200, 1600]],
];

const DESC = [
    'Frets' => ['21', '22', '24'],
    'Color body' => ['none', 'red', 'white', 'black'],
    'Size' => ['1/4', '3/4', '1/8', '7/8', '1/2', '4/4'],
    'Wood' => ['spruce', 'cedar', 'rosewood', 'cypress'],
];

const REDUCE = [10, 20, 30, 40, 50, 60, 70, 80, 90];

const PICKS = ['guitar.pick.1.png', 'guitar.pick.2.png', 'guitar.pick.3.png'];

function randomCreateArticle($nbrArticle, $db)
{

    for ($i = 0; $i < $nbrArticle; $i++) {

        $category = mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");

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
        resizeThumb($new_name_img, $imgWidth = 267, $imgHeight = 400, '.png');

        $text_pick = 'none';
        $new_name_pick = '';

        $luck_pick = mt_rand(1, 3);
        if ($luck_pick === 1) {
            $img_pick = PICKS[array_rand(PICKS, 1)];
            $new_name_pick = date('U') . '_' . mt_rand(10000, 99999) . '.png';

            copy('img/src/' . $img_pick, 'img/original/' . $img_pick);
            rename('img/original/' . $img_pick, 'img/original/' . $new_name_pick);

            resizeThumb($new_name_pick, $imgWidth = 267, $imgHeight = 400, '.png');

            $text_pick = 'include';
        }

        $content_article = 'Frets : ' . DESC['Frets'][mt_rand(0, count(DESC['Frets']) - 1)] . '
Color body : ' . DESC['Color body'][mt_rand(0, count(DESC['Color body']) - 1)] . '
Size : ' . DESC['Size'][mt_rand(0, count(DESC['Size']) - 1)] . '
Wood : ' . DESC['Wood'][mt_rand(0, count(DESC['Wood']) - 1)] . '
Pick : ' . $text_pick;

        mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

        $article = mysqli_query($db, "INSERT INTO `catalog.article` ( `title_article`, `price_article`, `promo_article`, `show_article`, `date_article`, `date_promo_article`, `content_article` ) VALUES ('$title_article', '$price_article', '$promo_article','$show_article', NOW(), '$date_promo_article', '$content_article');");

        $id_article = mysqli_insert_id($db);

        $img = mysqli_query($db, "INSERT INTO `catalog.img` ( `name_img`, `fkey_id_article`) VALUES ( '$new_name_img', '$id_article');");

        if (!empty($new_name_pick)) {
            mysqli_query($db, "INSERT INTO `catalog.img` ( `name_img`, `fkey_id_article`) VALUES ( '$new_name_pick', '$id_article');");
        }

        $category = mysqli_query($db, "INSERT INTO `catalog.category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$id_category', '$id_article')");

        if ($article && $img && $category) {
            mysqli_commit($db);
        } else {
            mysqli_rollback($db);
        }
    }

}

