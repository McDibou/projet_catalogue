<div id="body-accueil">
    <img src="img/src/accueil.jpg" alt="">
</div>
<h1 class="title-accueil">GUIT.DEV</h1>


<?php foreach ($promo as $item) { ?>
    <div id="article" class="promo-accueil">
        <?php $img = readImg($item['id_article'], $db); ?>
        <?php foreach ($img as $affiche) { ?>
            <img src="img/<?= $affiche['name_img'] ?>">
        <?php } ?>

        <h1><?= $item['title_article'] ?></h1>
        <p id="prix"><?= $item['price_article'] ?>€</p>
        <?= ($item['promo_article'] !== '0' ) ? '<p id="promo">-'. $item['promo_article'] .'%</p>': ''; ?>

        <?php $category = readCategory($item['id_article'], $db) ?>
        <?php foreach ($category as $cat) { ?>
            <div><?= $cat['name_category'] ?></div>

        <?php } ?>
    </div>
<?php } ?>


    <?php foreach ($show as $item) { ?>
    <div id="article"  class="show-accueil">
        <h1><?= $item['title_article'] ?></h1>
        <p id="prix"><?= $item['price_article'] ?>€</p>
        <?= ($item['promo_article'] !== '0' ) ? '<p id="promo">-'. $item['promo_article'] .'%</p>': ''; ?>

        <?php $category = readCategory($item['id_article'], $db) ?>
        <?php foreach ($category as $cat) { ?>
            <div><?= $cat['name_category'] ?></div>
        <?php } ?>
    </div>
    <?php } ?>
