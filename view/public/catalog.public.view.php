<!-- public catalog view page -->
<title>Guit.dev - Catalog</title>

<!-- div with the css for entry -->
<div class="overlay"></div>

<!-- image for page background -->
<div class="body-accueil img-catalog">
    <img src="img/src/accueil.jpg" alt="">
</div>

<!-- the search system form -->
<div class="search">
    <form method="get">

        <!-- input that is used to rewrite the url during the search to stay on the current page -->
        <input name="p" value="catalog.public" type="hidden">

        <!-- a dropdown menu for categories -->
        <select name="category">
            <option value="">global</option>
            <!-- loop that recovers the categories from the database -->
            <?php foreach ($category_option as $option) { ?>
                <option
                        value="<?= $option['name_category'] ?>"
                    <?= ($option['name_category'] === $category) ? "selected" : ""; ?>
                >
                    <?= $option['name_category'] ?>
                </option>
            <?php } ?>
        </select>

        <!-- two sliders for prices -->
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

        <!-- a search button -->
        <button class="search-button" type="submit">
            <span><?= SVG_SEARCH ?></span>
        </button>

        <!-- a refresh button -->
        <a class="search-button" href="?p=catalog.public&refresh=true">
            <span><?= SVG_REFRESH ?></span>
        </a>

    </form>
</div>

<!-- if there are many articles in the database -->
<?php if ($countArticle !== 0) { ?>
    <div class="block-catalog">
        <div class="catalog">
            <!-- loop that recovers the articles from the database  -->
            <?php foreach ($article as $item) { ?>
                <div id="article" class="card">
                    <?= cardModel($item) ?>
                </div>
            <?php } ?>

        </div>
        <!-- variable that recovers the pagination -->
        <?= $switch ?>
    </div>
    <!-- else displays a message -->
<?php } else { ?>
    <div class="message-catalog">NOT FOUND !</div>
<?php } ?>

<!-- call of the the js script for promo calculation with countdown -->
<script src="js/date.js"></script>
<!-- call of the the js script for switching images in lightbox -->
<script src="js/slider.js"></script>
