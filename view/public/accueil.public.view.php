
<?php foreach ($promo as $item) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>

    <?php $category = readCategory($item['id_article'], $db) ?>
    <?php foreach ($category as $cat) { ?>
        <div><?= $cat['name_category'] ?></div>
    <?php } ?>

    <?php $img = readImg($item['id_article'], $db); ?>
    <?php foreach ($img as $affiche) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>

<?php foreach ($show as $item) { ?>
    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>

    <?php $category = readCategory($item['id_article'], $db) ?>
    <?php foreach ($category as $cat) { ?>
        <div><?= $cat['name_category'] ?></div>
    <?php } ?>


    <?php $img = readImg($item['id_article'], $db); ?>
    <?php foreach ($img as $affiche) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>