<?php

function readModifyArticle($id, $db)
{

    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM article JOIN category ON id_category = category_id_category JOIN img ON article_id_article = id_article WHERE id_article = '$id'"));

}