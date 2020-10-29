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
    return mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` $where LIMIT $limit, $ndrArticle");
}

function readGlobalArticle($db, $where, $limit, $ndrArticle)
{
    return mysqli_query($db, "SELECT * FROM `article` $where LIMIT $limit, $ndrArticle ");
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

function readOneImg($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = '$id' LIMIT 1"));
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
            if ($i != $currentPage) {
                $out .= "<a class='switch-left' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage - 1) . "'>
                    <svg width='4em' height='4em' viewBox='0 0 16 16' class='bi bi-caret-left-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                        <path d='M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z'/>
                    </svg>
                </a>";
            }
        };
        $out .= ($i == $currentPage) ? "<p class='switch-number-current'>$i</p> " : "<a class='switch-number-not' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=$i'>$i</a>";


        if ($numberPage == $i) {

            if ($currentPage != $i) {
                $out .= "<a class='switch-right' href='?p=catalog.public&category=$category&min=$min&max=$max&switch=" . ($currentPage + 1) . "'>
                    <svg width='4em' height='4em' viewBox='0 0 16 16' class='bi bi-caret-right-fill' fill='currentColor' xmlns='http://www.w3.org/2000/svg'>
                         <path d='M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z'/>
                    </svg>
                </a>";
            }
        }
    }
    $out .= "</div>";
    return $out;
}
