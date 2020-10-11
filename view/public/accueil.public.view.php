<hr>
promo
<?php while ($item = mysqli_fetch_assoc($promo)) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>
<?php } ?>

    <hr>
show
<?php while ($item = mysqli_fetch_assoc($show)) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>
<?php } ?>