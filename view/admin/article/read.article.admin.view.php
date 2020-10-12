<?php $img = readImg($article['id_article'], $db); ?>
<?php while ($item = mysqli_fetch_assoc($img)) { ?>
    <div><?= $item['name_img'] ?></div>
<?php } ?>

<div>
    <h1><?= $article['title_article'] ?></h1>
    <p><?= $article['price_article'] ?></p>
    <p><?= $article['promo_article'] ?></p>
    <em><?= $article['name_category'] ?></em>
    <p><?= $article['content_article'] ?></p>
    <em><?= $article['date_article'] ?></em>
</div>
<div>
    <a href="?p=create.img.admin&id=<?= $article['id_article'] ?>">modify.img</a>
    <a href="?p=modify.article.admin&id=<?= $article['id_article'] ?>">modify</a>
    <a href="?p=delete.article.admin&id=<?= $article['id_article'] ?>">delete</a>
</div>