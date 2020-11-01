<?php

function analyseData($data)
{
    return htmlspecialchars(strip_tags(trim($data)), ENT_QUOTES, 'UTF-8');
}

function readOptionCategory($db)
{
    return mysqli_query($db, "SELECT * FROM `category`");
}

function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}

function readArticle($db, $where, $limit, $ndrArticle)
{
    return mysqli_query($db, "SELECT
    *,
    (
    SELECT
        GROUP_CONCAT(`name_category` SEPARATOR '|_|')
    FROM
        `category`
    JOIN category_has_article ON id_category = fkey_id_category
    JOIN article ar ON
        id_article = fkey_id_article
    WHERE
        ar.id_article = a.id_article
) AS `group_name_category`,
(
    SELECT
        GROUP_CONCAT(`name_img` SEPARATOR '|_|')
    FROM
        `img`
    JOIN article ar ON
        fkey_id_article = id_article
    WHERE
        ar.id_article = a.id_article
) AS `group_name_img`
FROM
    `article` a
JOIN category_has_article ON fkey_id_article = id_article
JOIN category ON fkey_id_category = id_category
$where 
GROUP BY
    `id_article`
    LIMIT $limit, $ndrArticle");

}

function countArticle($db, $where)
{

    $resp = mysqli_query($db, "SELECT * FROM `article` $where");
    return mysqli_num_rows($resp);
}

function countWithArticle($db, $where)
{
    $resp = mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` $where");
    return mysqli_num_rows($resp);
}

function countPrice($db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT min(`price_article`) AS minPrice, max(`price_article`) AS maxPrice FROM `article` "));
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = '$id'");
}

function readOneShow($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` WHERE `id_article` = $id"));
}

function switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max)
{
    $out = "";
    $numberPage = ceil($countArticle / $ndrArticle);

    if ($numberPage < 2) return $out;

    $out .= "<div class='switch-number'>";

    for ($i = 1; $i <= $numberPage; $i++) {
        if ($i == 1) {
            $out .= ($i == $currentPage) ? "<a class='switch-left-not'>" . CARET_RIGHT . "</a>" : "<a class='switch-left' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage - 1) . "'>" . CARET_RIGHT . "</a>";
        }
        $out .= ($i == $currentPage) ? "<a class='switch-number-current'>$i</a> " : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=$i'>$i</a>";
        if ($numberPage == $i) {
            $out .= ($currentPage == $i) ? "<a class='switch-right-not'>" . CARET_LEFT . "</a>" : "<a class='switch-right' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage + 1) . "'>" . CARET_LEFT . "</a>";
        }
    }

    $out .= "</div>";
    return $out;
}