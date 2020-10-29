<div class="body-accueil img-catalog">
    <img src="img/src/accueil.jpg" alt="">
</div>

<div class="search">
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
                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-caret-right-fill"
                     fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                </svg>
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
                <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-caret-left-fill"
                     fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
            </div>
            <div id="max">
                <?= $max ?>
            </div>

        </div>

        <button class="search-button" type="submit">
            <svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                <path fill-rule="evenodd"
                      d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
            </svg>
        </button>
        <a class="search-button" href="?p=catalog.public">
            <svg width="1.4em" height="1.4em" viewBox="0 0 16 16" class="bi bi-arrow-repeat" fill="currentColor"
                 xmlns="http://www.w3.org/2000/svg">
                <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"/>
                <path fill-rule="evenodd"
                      d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"/>
            </svg>
        </a>

    </form>
</div>

<div class="catalog">
    <?php foreach ($article as $item) { ?>
        <div id="article" class="card">
            <div class="title">
                <h3>GUIT.DEV/</h3>
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
                <p id="prix"><?= $item['price_article'] ?>€</p>
                <p id="promo"><?= ($item['promo_article'] !== '0') ? 'SAVE ' . $item['promo_article'] . '%' : ''; ?></p>
            </div>
            <a class="link-pay" href="">ADD TO CARD</a>

            <div class="img">
                <?php $img = readOneImg($item['id_article'], $db); ?>
                <img class="img2" src="img/original/<?= $img['name_img'] ?>">
                <img class="img1" src="img/original/<?= $img['name_img'] ?>">
            </div>
            <form method="post">
                <input id="id-article" name="id_article" value="<?= $item['id_article'] ?>" type="hidden">
                <button name="lightbox" type="submit" class="link-show">
                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-arrow-right-square-fill"
                         fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 8.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                    </svg>
                </button>
            </form>
        </div>
    <?php } ?>
</div>

<?= $switch ?>
<div class="message-catalog"><?= !empty($message) ? $message : '' ?></div>