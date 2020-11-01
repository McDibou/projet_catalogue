<?php

function readArticle($id, $db)
{
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT
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
WHERE `id_article` = '$id'"));
}

function readImg($id, $db)
{
    return mysqli_query($db, "SELECT * FROM `img` JOIN `article` ON `id_article` = `fkey_id_article` WHERE `id_article` = $id ");
}