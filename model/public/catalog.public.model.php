<?php

function readOptionCategory($db)
{
    return mysqli_query($db, "
    SELECT * FROM category
    ");
}

function readArticle($db, $where, $limit, $ndrArticle)
{
    return mysqli_query($db, "
    SELECT * FROM article JOIN category ON id_category = category_id_category $where  ORDER BY date_article ASC LIMIT $limit,$ndrArticle
    ");
}

function countArticle($db, $where)
{
    $result = mysqli_query($db, "
    SELECT * FROM article JOIN category ON id_category = category_id_category $where  ORDER BY date_article
    ");

    return mysqli_num_rows($result);
}

function countPrice($db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT min(price_article) AS minPrice, max(price_article) AS maxPrice FROM article "));
}


function switchArticle($countArticle, $currentPage, $ndrArticle, $category, $min, $max)
{

    $out = "";
    $numberPage = ceil($countArticle / $ndrArticle);

    if ($numberPage < 2) return $out;

    for ($i = 1; $i <= $numberPage; $i++) {
        if ($i == 1) {
            if ($i != $currentPage) {
                $out .= "<a href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage - 1) . "'>Previous</a> | ";
            }
        }
        $out .= ($i == $currentPage) ? "$i | " : "<a href='?p=catalog.public&category=$category&min=$min&max=$max&switch=$i'>$i</a> | ";

        if ($numberPage == $i) {

            if ($currentPage != $i) {
                $out .= "<a href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage + 1) . "'>Next</a> | ";
            }
        }
    }

    return $out;

}
