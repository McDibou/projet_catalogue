<form method="get">
    <input name="p" value="catalog.public" type="hidden">

    <select name="category">
        <option value="">global</option>
        <?php foreach ($category_option as $item) { ?>
            <option
                    value="<?= $item['name_category'] ?>"
                <?= ($item['name_category'] === $category) ? "selected" : ""; ?>
            >
                <?= $item['name_category'] ?>
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

    <button type="submit">search</button>
</form>


<?php foreach ($article as $item) { ?>

    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>

    <?php $category = readCategory($item['id_article'], $db) ?>
    <?php foreach ($category as $item) { ?>
        <div><?= $item['name_category'] ?></div>
    <?php } ?>

    <?php $img = readImg($item['id_article'], $db); ?>
    <?php foreach ($img as $affiche) { ?>
        <p><?= $affiche['name_img'] ?></p>
    <?php } ?>

<?php } ?>

<?= $switch ?>