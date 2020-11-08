<?php

function deletePromo($id, $db)
{
    return mysqli_query($db, "UPDATE `catalog.article` SET `promo_article` = '0', `date_promo_article` = '0' WHERE `id_article` = $id;");
}