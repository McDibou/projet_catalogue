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

    <button type="submit">search</button>
</form>

<div class="catalog">
    <?php foreach ($article as $item) { ?>
        <div class="catalog-card">
            <div id="article" class="card">
                <div class="title">
                    <h2>GUIT.DEV/</h2>
                    <h5><?= $item['title_article'] ?></h5>
                </div>
                <div class="category">
                    <?php $category = readCategory($item['id_article'], $db) ?>
                    <?php foreach ($category as $cat) { ?>
                        <div><?= $cat['name_category'] ?></div>
                    <?php } ?>
                </div>
                <div class="desc">
                    <pre><?= $item['content_article'] ?></pre>
                </div>
                <div>
                    <p id="prix"><?= $item['price_article'] ?> €</p>
                    <p id="promo"><?= ($item['promo_article'] !== '0') ? 'SAVE ' . $item['promo_article'] . '%' : ''; ?></p>
                </div>
                <a class="link-pay" href="">ADD TO CARD</a>

                <div class="img">
                    <?php $img = readImg($item['id_article'], $db); ?>
                    <?php foreach ($img as $affiche) { ?>
                        <img class="img2" src="img/<?= $affiche['name_img'] ?>">
                        <img class="img1" src="img/<?= $affiche['name_img'] ?>">

                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?= $switch ?>