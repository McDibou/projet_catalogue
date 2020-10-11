
<form method="get">
    <input name="p" value="catalog.public" type="hidden">

    <select name="category">
        <option value="">global</option>
        <?php while ($item = mysqli_fetch_assoc($category_option)) { ?>
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


<?php while ($item = mysqli_fetch_assoc($article)) { ?>

    <h1><?= $item['title_article'] ?></h1>
    <em><?= $item['price_article'] ?></em>
    <p><?= $item['promo_article'] ?></p>
    <p><?= $item['name_category'] ?></p>

<?php } ?>


<?= $switch ?>