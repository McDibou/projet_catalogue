<?php
/**
 * selects all article that have a date older than the current one
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readPromo($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `date_promo_article` > NOW()");
}

/**
 * selects all the articles that are highlighted
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readShow($db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `show_article` != 0");
}

/**
 * select an article
 * @param mysqli|false $db
 * @param number $id
 * @return string[]|null
 */
function readOneShow($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `catalog.article` WHERE `id_article` = $id"));
}

/**
 * selects the images of an item
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.img` WHERE `fkey_id_article` = '$id'");
}

/**
 * selects all the information of an article whose promotion date is older than now with group concat
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readThreePromo($id, $db)
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
WHERE `date_promo_article` > NOW() AND `id_article` IN ($id) GROUP BY `id_article` LIMIT 3");
}

/**
 * selects the categories in relation to an article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `catalog.article` JOIN `catalog.category_has_article` ON `id_article` = `fkey_id_article` JOIN `catalog.category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}