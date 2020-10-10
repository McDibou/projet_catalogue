<?php

function readArticle($id, $db) {
    return mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM article JOIN category ON id_category = category_id_category JOIN img ON id_article = article_id_article WHERE id_article = '$id'"));
}