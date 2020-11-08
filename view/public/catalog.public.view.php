<title>Guit.dev - Catalog</title>

<div class="overlay"></div>
<div class="body-accueil img-catalog">
    <img src="img/src/accueil.jpg" alt="">
</div>


<div class="search">
    <form method="get">
        <input name="p" value="catalog.public" type="hidden">
        <select name="category">
            <option value="">global</option>
            <?php foreach ($category_option as $option) { ?>
                <option
                        value="<?= $option['name_category'] ?>"
                    <?= ($option['name_category'] === $category) ? "selected" : ""; ?>
                >
                    <?= $option['name_category'] ?>
                </option>
            <?php } ?>
        </select>

        <div class="slider">
            <input
                    id="lower"
                    name="min"
                    value="<?= (!empty($min)) ? $min : null; ?>"
                    min="<?= $priceMin ?>"
                    max="<?= $priceMax ?>"
                    type="range"
                    step="5">

            <div id="min">
                <?= $min ?>
            </div>
            <div id="left">
                <span><?= CARET_LEFT ?></span>
            </div>

            <input
                    id="upper"
                    value="<?= (!empty($max)) ? $max : null; ?>"
                    name="max"
                    min="<?= $priceMin ?>"
                    max="<?= $priceMax ?>"
                    type="range"
                    step="5">

            <div id="right">
                <span><?= CARET_RIGHT ?></span>
            </div>
            <div id="max">
                <?= $max ?>
            </div>

        </div>
        <button class="search-button" type="submit">
            <span><?= SVG_SEARCH ?></span>
        </button>
        <a class="search-button" href="?p=catalog.public&refresh=true">
            <span><?= SVG_REFRESH ?></span>
        </a>
    </form>
</div>

<?php if ($countArticle !== 0) { ?>
    <div class="block-catalog">
        <div class="catalog">
            <?php foreach ($article as $item) { ?>
                <div id="article" class="card">
                    <?= cardModel($item) ?>
                </div>
            <?php } ?>

        </div>
        <?= $switch ?>
    </div>
<?php } else { ?>
    <div class="message-catalog">NOT FOUND !</div>
<?php } ?>

<script src="js/date.js"></script>
<script src="js/slider.js"></script>
