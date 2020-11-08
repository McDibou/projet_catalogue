<title>Guit.dev - Home</title>

<div class="overlay"></div>
<div class="overlay bg1"></div>
<div class="overlay bg2"></div>
<div class="overlay bg3"></div>

<div class="body-accueil">
    <img src="img/src/accueil.jpg" alt="">
</div>

<div class="block-accueil">
    <div>
        <div class="title-accueil">
            <img src="img/src/logo.white.png" alt="">
        </div>

        <p class="intro-accueil">
            " The art of vibrating wood "
        </p>
    </div>

    <?php if ($countPromo !== 0) { ?>
        <div class="card-accueil">
            <?php if ($countPromo > 1) { ?>
                <a class="next" onclick="sliderMove(1)">
                    <span><?= CARET_UP ?></span>
                </a>
            <?php } ?>
            <div class="animated">
                <?php foreach ($promo as $item) { ?>
                    <div id="article" class="card slide">
                        <?= cardModel($item) ?>
                    </div>
                <?php } ?>
            </div>
            <?php if ($countPromo > 1) { ?>
                <a class="prev" onclick="sliderMove(-1)">
                    <span><?= CARET_DOWN ?></span>
                </a>
            <?php } ?>
        </div>
    <?php } ?>
</div>

<?php if ($countShow !== 0) { ?>
    <div class="show-art">
        <div class="title">
            <h3>GUIT.DEV/</h3>
            <h5><?= $show['title_article'] ?></h5>
        </div>
        <div class="category">
            <?php $category = readCategory($show['id_article'], $db) ?>
            <?php foreach ($category as $cat) { ?>
                <div><?= $cat['name_category'] ?></div>
            <?php } ?>
        </div>

        <div class="link">
            <div>CURRENT ARTICLE</div>
            <form method="GET">
                <input name="p" value="read.article.public" type="hidden">
                <input name="id" value="<?= $show['id_article'] ?>" type="hidden">
                <button type="submit" class="link-show">
                    <span><?= SVG_SHOW_LINK ?></span>
                </button>
            </form>
        </div>
    </div>
<?php } ?>

<script src="js/date.js"></script>
<script src="js/carousel.js"></script>
