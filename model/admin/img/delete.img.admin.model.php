<?php

function deleteImg($id, $db)
{
    return mysqli_query($db, "DELETE FROM img WHERE id_img = '$id'");
}

function selectIdArticle($id, $db)
{
    $result = mysqli_fetch_assoc(mysqli_query($db, "SELECT id_article FROM article JOIN img ON id_article = article_id_article WHERE id_img = '$id'"));
    return $result['id_article'];
}