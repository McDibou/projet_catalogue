<?php

function readPromo($db)
{
    return mysqli_query($db, "SELECT * FROM `article` WHERE `date_promo_article` > NOW()");
}

function readShow($db)
{
    return mysqli_query($db, "SELECT * FROM `article` WHERE `show_article` != 0");
}

function readOneShow($db, $id)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM `article` WHERE `id_article` = $id"));
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` WHERE `fkey_id_article` = '$id'");
}

function readThreePromo($id, $db)
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
WHERE `date_promo_article` > NOW() AND `id_article` IN ($id) GROUP BY id_article LIMIT 3");
}

function readCategory($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `article` JOIN `category_has_article` ON `id_article` = `fkey_id_article` JOIN `category` ON `id_category` = `fkey_id_category` WHERE `id_article` = '$id'");
}