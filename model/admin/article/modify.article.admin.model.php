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
 * select a article
 * @param number $id
 * @param mysqli|false $db
 * @return string[]|null
 */
function readModifyArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'"));
}

/**
 * update a article
 * @param number $id
 * @param string $title_article
 * @param string $price_article
 * @param string $content_article
 * @param mysqli|false $db
 */
function modifyArticle($id, string $title_article, string $price_article, string $content_article, $db)
{
    mysqli_query($db, "UPDATE `catalog.article` SET `title_article` = '$title_article', `price_article` = '$price_article', `content_article` = '$content_article' WHERE `id_article` = $id;");
}

/**
 * select a images with a article
 * @param mysqli|false $db
 * @param number $id
 * @return bool|mysqli_result
 */
function readImg($db, $id)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = $id");
}

/**
 * select a cartegory with a article
 * @param mysqli|false $db
 * @param number $id
 * @return bool|mysqli_result
 */
function readCategory($db, $id)
{
    return mysqli_query($db, "SELECT * FROM `catalog.category` JOIN `catalog.category_has_article` ON `id_category` = `fkey_id_category` JOIN `catalog.article` ON `fkey_id_article` = `id_article` WHERE `id_article` = $id");
}

/**
 * select a the information of an article with `group concat`
 * @param number $id
 * @param mysqli|false $db
 * @return string[]|null
 */
function readArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT
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
WHERE `id_article` = '$id'"));
}