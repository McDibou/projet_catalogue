<?php

function analyseData($data)
{
    return htmlentities(htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8'));
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category`");
}

function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}

function readArticle($db, $where, $limit, $ndrArticle)
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

function countArticle($db, $where)
{

    $resp = mysqli_query($db, "SELECT * FROM `catalog.article` $where");
    return mysqli_num_rows($resp);
}

function countWithArticle($db, $where)
{
    $resp = mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` $where");
    return mysqli_num_rows($resp);
}

function countPrice($db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT min(`price_article`) AS minPrice, max(`price_article`) AS maxPrice FROM `catalog.article` "));
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
}

function readOneShow($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `id_article` = $id"));
}

function switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max)
{
    $out = "";
    $numberPage = ceil($countArticle / $ndrArticle);

    if ($numberPage < 2) return $out;

    $out .= "<div class='switch-number'>";

    $out .= ($currentPage == 1) ? "<a class='switch-left-not'>" . CARET_RIGHT . "</a>" : "<a class='switch-left' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage - 1) . "'>" . CARET_RIGHT . "</a>";
    $out .= ($currentPage == 1) ?  "<a class='switch-number-current'>1</a>" : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=1'>1</a>";

    $i = max(2, $currentPage - 2);

    if ($i > 2) {
        $out .= "<a class='switch-number-current'>..</a>";
    }

    for (; $i < min($currentPage + 3, $numberPage); $i++) {
        $out .= ($i == $currentPage) ? "<a class='switch-number-current'>$i</a> " : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=$i'>$i</a>";
    }

    if ($i < $numberPage) {
        $out .= "<a class='switch-number-current'>..</a>";
    }

    $out .= ($currentPage == $numberPage) ? "<a class='switch-number-current'>" . $numberPage . "</a>" : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . $numberPage . "'>" . $numberPage . "</a>";
    $out .= ($currentPage == $numberPage) ? "<a class='switch-right-not'>" . CARET_LEFT . "</a>" : "<a class='switch-right' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage + 1) . "'>" . CARET_LEFT . "</a>";

    $out .= "</div>";
    return $out;
}