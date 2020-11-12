<?php

// define a constant table with specific images linked to categories, that are imported in the root of the project
const PICTURE = [
    'folk' => ['guitdev.folk.1.png'],
    'acoustic' => ['guitdev.acoustic.1.png', 'guitdev.acoustic.2.png'],
    'electric' => ['guitdev.electric.1.png', 'guitdev.electric.2.png', 'guitdev.electric.3.png'],
    'electro acoustic' => ['guitdev.electro.acoustic.1.png', 'guitdev.electro.acoustic.2.png'],
    'ukulele' => ['guitdev.ukulele.1.png'],
    'other' => ['guitdev.folk.1.png']
];

//defines a constant table with price ranges according to size
const TAILLE = [
    'little' => ['L', [200, 400]],
    'medium' => ['M', [400, 800]],
    'hight' => ['H', [800, 1200]],
    'xtrem' => ['X', [1200, 1600]],
];


// defines a constant table for the description of the article
const DESC = [
    'Frets' => ['21', '22', '24'],
    'Color body' => ['none', 'red', 'white', 'black'],
    'Size' => ['1/4', '3/4', '1/8', '7/8', '1/2', '4/4'],
    'Wood' => ['spruce', 'cedar', 'rosewood', 'cypress'],
];

//defined a constant table for reductions
const REDUCE = [10, 20, 30, 40, 50, 60, 70, 80, 90];

// defines a constant array for the picks images
const PICKS = ['guitar.pick.1.png', 'guitar.pick.2.png', 'guitar.pick.3.png'];

/**
 * random article creation
 * @param number $nbrArticle
 * @param mysqli|false $db
 */
function randomCreateArticle($nbrArticle, $db)
{
    // create a loop for the number of articles you want to create pass as argument by the user
    for ($i = 0; $i < $nbrArticle; $i++) {

        // select categories of the database
        $category = mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");

        // create a table with the first two letters of the category and the corresponding image
        $tab_category = [];
        foreach ($category as $cat) {
            // checks if the element retrieved from the db exists in the array and assigns their value else assigns a default image
            if (!empty(PICTURE[$cat['name_category']])) {
                $name_img = PICTURE[$cat['name_category']][array_rand(PICTURE[$cat['name_category']], 1)];
                $tab_category[$cat['name_category']] = [strtoupper(substr($cat['name_category'], 0, 2)), $cat['id_category'], $name_img];
            } else {
                $tab_category[$cat['name_category']] = [strtoupper(substr($cat['name_category'], 0, 2)), $cat['id_category'], PICTURE['other'][0]];
            }
        }


        // defined a random size to adjust the price of the article
        $key_taille = array_rand(TAILLE, 1);
        // choose a random category for the article from the table created above.
        $key_category = array_rand($tab_category, 1);

        // select the id of the category to create the foreign key in the database
        $id_category = $tab_category[$key_category][1];

        // choose a number to define the item code
        $nbr = mt_rand(0, 99);
        // check the length of the number to add a 0 in front of it if necessary
        $number = (strlen((string)$nbr) === 1) ? '0' . $nbr : $nbr;
        // constructs the name of the article according to the previous data. ex : `LAC 03`
        $title_article = TAILLE[$key_taille][0] . '' . $tab_category[$key_category][0] . ' ' . $number;

        // define the price of the article according to its size chosen above
        $price_article = mt_rand(TAILLE[$key_taille][1][0], TAILLE[$key_taille][1][1]) . '.99';

        // set the variable for the promotion and the date of promotion of the article
        $promo_article = '';
        $date_promo_article = '';

        // gives the article a chance to get a promotion
        $luck_promo = mt_rand(1, 10);
        if ($luck_promo === 1) {

            // choose a promotional value for the item defined above
            $rand = array_rand(REDUCE, 1);
            $promo_article = REDUCE[$rand];

            // choose a value for the promotion date
            $date_promo = mt_rand(1, 20);
            $date_promo_article = date('Y-m-d H:i:s', strtotime('+' . $date_promo . ' day'));

        }

        // create a chance for the article to be put forward
        $luck_show = mt_rand(1, 12);
        $show_article = ($luck_show === 1) ? 1 : 0;

        // select the name of the image defined above
        $name_img = $tab_category[$key_category][2];
        // define new name for the image
        $new_name_img = date('U') . '_' . mt_rand(10000, 99999) . '.png';

        // check if the folder where the image will be copied to exists.
        if (!is_dir('img/original')) {
            mkdir('img/original', 0777, true);
        }

        // copies the image from the root of the project
        copy('img/src/' . $name_img, 'img/original/' . $name_img);
        // renames the image so that each item is its own image, as there will be duplicates
        rename('img/original/' . $name_img, 'img/original/' . $new_name_img);
        // create a thumbnail of the image
        resizeThumb($new_name_img, $imgWidth = 267, $imgHeight = 400, '.png');

        // defined that the item does not have piks includes for the description
        $text_pick = 'none';

        // defines the chance to have a picks
        $luck_pick = mt_rand(1, 3);
        if ($luck_pick === 1) {
            //select an image from the table defined above
            $img_pick = PICKS[array_rand(PICKS, 1)];
            // define new name for the image
            $new_name_pick = date('U') . '_' . mt_rand(10000, 99999) . '.png';
            // copies the image from the root of the project
            copy('img/src/' . $img_pick, 'img/original/' . $img_pick);
            // renames the image so that each item is its own image, as there will be duplicates
            rename('img/original/' . $img_pick, 'img/original/' . $new_name_pick);
            // create a thumbnail of the image
            resizeThumb($new_name_pick, $imgWidth = 267, $imgHeight = 400, '.png');

            // rewrites the text for the description
            $text_pick = 'include';
        }

        // Write the description of the article according to the table defined above.
        $content_article = 'Frets : ' . DESC['Frets'][mt_rand(0, count(DESC['Frets']) - 1)] . '
Color body : ' . DESC['Color body'][mt_rand(0, count(DESC['Color body']) - 1)] . '
Size : ' . DESC['Size'][mt_rand(0, count(DESC['Size']) - 1)] . '
Wood : ' . DESC['Wood'][mt_rand(0, count(DESC['Wood']) - 1)] . '
Pick : ' . $text_pick;

        //  starts a transaction to insert all the data of the article at the same time
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

    // if an error occurs during insertion the article is not created but the function continues its loop

}

