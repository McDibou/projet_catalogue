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
 * select all categories
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category`");
}

/**
 * select categories in relation to an article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}

/**
 * select all the information of an article with `group concat`
 * @param mysqli|false $db
 * @param string $where
 * @param number $limit
 * @param number $ndrArticle
 * @return bool|mysqli_result
 */
function readArticle($db, string $where, $limit, $ndrArticle)
{
    return mysqli_query($db, "SELECT
    *,
    (
    SELECT
        GROUP_CONCAT(`name_category` SEPARATOR '|_|')
    FROM
        `catalog.category`
    JOIN `catalog.category_has_article` ON `id_category` = `fkey_id_category`
    JOIN `catalog.article` ar ON
        `id_article` = `fkey_id_article`
    WHERE
        ar.`id_article` = a.`id_article`
) AS `group_name_category`,
(
    SELECT
        GROUP_CONCAT(`name_img` SEPARATOR '|_|')
    FROM
        `catalog.img`
    JOIN `catalog.article` ar ON
        `fkey_id_article` = `id_article`
    WHERE
        ar.`id_article` = a.`id_article`
) AS `group_name_img`
FROM
    `catalog.article` a
JOIN `catalog.category_has_article` ON `fkey_id_article` = `id_article`
JOIN `catalog.category` ON `fkey_id_category` = `id_category`
$where 
GROUP BY
    `id_article`
    LIMIT $limit, $ndrArticle");

}

/**
 * counts all items with certain conditions
 * @param mysqli|false $db
 * @param string $where
 * @return int
 */
function countArticle($db, string $where)
{
    return mysqli_num_rows(mysqli_query($db, "SELECT * FROM `catalog.article` $where"));
}

/**
 * counts all items with certain conditions
 * @param mysqli|false $db
 * @param string $where
 * @return int
 */
function countWithArticle($db, string $where)
{
    return mysqli_num_rows(mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` $where"));
}

/**
 * select the minimum and maximum value of the article prices
 * @param mysqli|false $db
 * @return string[]|null
 */
function countPrice($db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT min(`price_article`) AS minPrice, max(`price_article`) AS maxPrice FROM `catalog.article` "));
}

/**
 * select images link to an article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
}

/**
 * select an article
 * @param mysqli|false  $db
 * @param number $id
 * @return string[]|null
 */
function readOneShow($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `id_article` = $id"));
}

/**
 * create a pagination
 * @param number $countArticle
 * @param number $currentPage
 * @param number $ndrArticle
 * @param string $category
 * @param number $min
 * @param number $max
 * @return string
 */
function switchArticle($countArticle, $currentPage, $ndrArticle,string $category, $min, $max)
{
    $out = "";

    // counts the number of pages
    $numberPage = ceil($countArticle / $ndrArticle);

    // if there is a page returned $out with nothing
    if ($numberPage < 2) return $out;

    $out .= "<div class='switch-number'>";

    // create the left arrow and the first cursor and if they are equal to the current page turn it off.
    $out .= ($currentPage == 1) ? "<a class='switch-left-not'>" . CARET_RIGHT . "</a>" : "<a class='switch-left' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage - 1) . "'>" . CARET_RIGHT . "</a>";
    $out .= ($currentPage == 1) ?  "<a class='switch-number-current'>1</a>" : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=1'>1</a>";

    // initialize $i for the loop
    $i = max(2, $currentPage - 2);

    // in second position, if $i is greater than 2, add div buffer
    if ($i > 2) {
        $out .= "<a class='switch-number-current'>..</a>";
    }

    // create only the cursor two before and two after the current page
    for (; $i < min($currentPage + 3, $numberPage); $i++) {
        $out .= ($i == $currentPage) ? "<a class='switch-number-current'>$i</a> " : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=$i'>$i</a>";
    }

    // in second last position, if $i is smaller than the page total, add div buffer
    if ($i < $numberPage) {
        $out .= "<a class='switch-number-current'>..</a>";
    }

    // create the right arrow and the last slider and if they are equal to the current page turn it off.
    $out .= ($currentPage == $numberPage) ? "<a class='switch-number-current'>" . $numberPage . "</a>" : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . $numberPage . "'>" . $numberPage . "</a>";
    $out .= ($currentPage == $numberPage) ? "<a class='switch-right-not'>" . CARET_LEFT . "</a>" : "<a class='switch-right' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage + 1) . "'>" . CARET_LEFT . "</a>";

    $out .= "</div>";
    return $out;
}