<form method="get">
    <input name="p" value="catalog.public" type="hidden">

    <select name="category">
        <option value="">global</option>
        <?php foreach ($category_option as $potion) { ?>
            <option
                    value="<?= $potion['name_category'] ?>"
                <?= ($potion['name_category'] === $category) ? "selected" : ""; ?>
            >
                <?= $potion['name_category'] ?>
            </option>
        <?php } ?>
    </select>

    <input
            value="<?= (!empty($min)) ? $min : null; ?>"
            name="min"
            min="<?= $price['minPrice'] ?>"
            max="<?= $price['maxPrice'] ?>"
            type="number">
    <input
            value="<?= (!empty($max)) ? $max : null; ?>"
            name="max"
            min="<?= $price['minPrice'] ?>"
            max="<?= $price['maxPrice'] ?>"
            type="number">

    <button name="search" type="submit">search</button>
</form>


<?php foreach ($article as $art) { ?>

    <h1><?= $art['title_article'] ?></h1>
    <em><?= $art['price_article'] ?></em>
    <p><?= $art['promo_article'] ?></p>

    <?php $category = readCategory($art['id_article'], $db) ?>
    <?php foreach ($category as $cat) { ?>
        <div><?= $cat['name_category'] ?></div>
    <?php } ?>

    <?php $img = readImg($art['id_article'], $db); ?>
    <?php foreach ($img as $affiche) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>

<?= $switch ?>