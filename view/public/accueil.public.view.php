<hr>
promo
<?php while ($item = mysqli_fetch_assoc($promo)) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>

    <?php $img = readImg($item['id_article'], $db); ?>
    <?php while ($affiche = mysqli_fetch_assoc($img)) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>

    <hr>
show
<?php while ($item = mysqli_fetch_assoc($show)) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>

    <?php $img = readImg($item['id_article'], $db); ?>
    <?php while ($affiche = mysqli_fetch_assoc($img)) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>