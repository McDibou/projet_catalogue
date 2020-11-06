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

function switchArticle($countArticle, $currentPage, $ndrArticle)
{
    $outRead = "";
    $numberPage = ceil($countArticle / $ndrArticle);

    if ($numberPage < 2) return $outRead;

    $outRead .= "<ul class='pagination'>";

    $outRead .= ($currentPage == 1) ? "<li class='page-item disabled'><a class='page-link'>&laquo;</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage - 1) . "'><span aria-hidden='true'>&laquo;</span></a></li>";
    $outRead .= ($currentPage == 1) ? "<li class='page-item disabled'><a class='page-link'>1</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=1'><span aria-hidden='true'>1</span></a></li>";

    $i = max(2, $currentPage - 2);

    if ($i > 2) {
        $outRead .= "<li class='page-item disabled'><a class='page-link'>...</a></li>";
    }

    for (; $i < min($currentPage + 3, $numberPage); $i++) {
        $outRead .= ($i == $currentPage) ? "<li class='page-item disabled'><a class='page-link'>$i</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=$i'>$i</a></li>";
    }

    if ($i < $numberPage) {
        $outRead .= "<li class='page-item disabled'><a class='page-link'>...</a></li>";
    }

    $outRead .= ($currentPage == $numberPage) ? "<li class='page-item disabled'><a class='page-link'>" . $numberPage . "</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . $numberPage . "'><span aria-hidden='true'>" . $numberPage . "</span></a></li>";
    $outRead .= ($currentPage == $numberPage) ? "<li class='page-item disabled'><a class='page-link'>&raquo;</a></li>" : "<li class='page-item'><a class='page-link' href='?p=create.article.admin&switch=" . ($currentPage + 1) . "'><span aria-hidden='true'>&raquo;</span></a></li>";


    $outRead .= "</div>";
    return $outRead;
}