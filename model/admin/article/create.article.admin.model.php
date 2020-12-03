<?php

/**
 * analyzes incoming data
 * @param mixed $data
 * @return string
 */
function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

/**
 * select all article with a pagination
 * @param mysqli|false $db
 * @param number $limit
 * @param number $ndrArticle
 * @return bool|mysqli_result
 */
function readArticle($db, $limit, $ndrArticle)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` LIMIT $limit, $ndrArticle");
}

/**
 * count all article
 * @param mysqli|false $db
 * @return number int
 */
function readCountArticle($db)
{
    return mysqli_num_rows(mysqli_query($db, "SELECT * FROM `catalog.article`"));
}


/**
 * select all categories order by name
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` ORDER BY `name_category` ASC");
}

/**
 * select all image witch a article
 * @param mysqli|false $db
 * @param number $id
 * @return bool|mysqli_result
 */
function readImg($db, $id)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = $id");
}

/**
 * select all categories with a article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readCategoryArticle($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` JOIN `catalog.category_has_article` ON `id_category` = `fkey_id_category` JOIN  `catalog.article` ON `id_article` = `fkey_id_article` WHERE `id_article` = $id");
}

/**
 * create article with its category and images
 * @param string $title_article
 * @param string $price_article
 * @param array $category_id
 * @param string $content_article
 * @param string $img_article
 * @param number $promo_article
 * @param number $date_promo_article
 * @param mysqli|false $db
 * @return bool
 */
function createArticle(string $title_article, string $price_article, array $category_id, string $content_article, string $img_article, $promo_article, $date_promo_article, $db)
{

    mysqli_begin_transaction($db, MYSQLI_TRANS_START_READ_WRITE);

    $article = mysqli_query($db, "INSERT INTO `catalog.article` ( `title_article`, `price_article`, `show_article`, `date_article`, `content_article`, `promo_article`, `date_promo_article` ) VALUES ( '$title_article', '$price_article', '0', NOW(), '$content_article','$promo_article','$date_promo_article');");

    $id_article = mysqli_insert_id($db);

    foreach ($category_id as $value) {
        mysqli_query($db, "INSERT INTO `catalog.category_has_article` ( `fkey_id_category` , `fkey_id_article` ) VALUES ('$value', '$id_article')");
    }

    $img = mysqli_query($db, "INSERT INTO `catalog.img` ( `name_img`, `fkey_id_article`) VALUES ( '$img_article', '$id_article');");

    if ($article && $img) {
        return mysqli_commit($db);
    } else {
        return mysqli_rollback($db);
    }

}

/**
 * create a pagination
 * @param number $countArticle
 * @param number $currentPage
 * @param number $ndrArticle
 * @return string
 */
function switchArticle($countArticle, $currentPage, $ndrArticle)
{
    $outRead = "";

    // counts the number of pages
    $numberPage = ceil($countArticle / $ndrArticle);

    // if there is a page returned $out with nothing
    if ($numberPage < 2) return $outRead;

    $outRead .= "<ul class='pagination'>";

    // create the left arrow and the first cursor and if they are equal to the current page turn it off.
    $outRead .= ($currentPage == 1) ? "<li class='page-item disabled'><a class='page-link'>&laquo;</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage - 1) . "'><span aria-hidden='true'>&laquo;</span></a></li>";
    $outRead .= ($currentPage == 1) ? "<li class='page-item disabled'><a class='page-link'>1</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=1'><span aria-hidden='true'>1</span></a></li>";

    // initialize $i for the loop
    $i = max(2, $currentPage - 2);

    // in second position, if $i is greater than 2, add div buffer
    if ($i > 2) {
        $outRead .= "<li class='page-item disabled'><a class='page-link'>...</a></li>";
    }

    // create only the cursor two before and two after the current page
    for (; $i < min($currentPage + 3, $numberPage); $i++) {
        $outRead .= ($i == $currentPage) ? "<li class='page-item disabled'><a class='page-link'>$i</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=$i'>$i</a></li>";
    }

    // in second last position, if $i is smaller than the page total, add div buffer
    if ($i < $numberPage) {
        $outRead .= "<li class='page-item disabled'><a class='page-link'>...</a></li>";
    }

    // create the right arrow and the last slider and if they are equal to the current page turn it off.
    $outRead .= ($currentPage == $numberPage) ? "<li class='page-item disabled'><a class='page-link'>" . $numberPage . "</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . $numberPage . "'><span aria-hidden='true'>" . $numberPage . "</span></a></li>";
    $outRead .= ($currentPage == $numberPage) ? "<li class='page-item disabled'><a class='page-link'>&raquo;</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage + 1) . "'><span aria-hidden='true'>&raquo;</span></a></li>";

    $outRead .= "</div>";
    return $outRead;
}