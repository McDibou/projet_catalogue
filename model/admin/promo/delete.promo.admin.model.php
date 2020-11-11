<?php

/**
 * update the promotion from a article
 * @param number $id
 * @param mysqli|false $db
 * @return bool|mysqli_result
 */
function deletePromo($id, $db)
{
    return mysqli_query($db, "UPDATE `catalog.article` SET `promo_article` = '0', `date_promo_article` = '0' WHERE `id_article` = $id;");
}