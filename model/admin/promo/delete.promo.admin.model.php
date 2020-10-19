<?php

function deletePromo($id, $db)
{
    mysqli_query($db, "UPDATE `article` SET `promo_article` = '0', `date_promo_article` = '0' WHERE `id_article` = $id;");
}