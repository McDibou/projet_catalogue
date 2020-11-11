<!-- page with the display of article cards in light box -->

<!-- title based on the selected article -->
<title>Guit.dev - Article <?= $item['title_article'] ?></title>

<!-- image for page background -->
<div class="light"><img src="img/src/accueil.jpg" alt=""></div>

<!-- article cards in light box -->
<div class="light-box" style="z-index: 3">
    <div class="box">
        <div id="article" class="card"> <?= cardModel($item) ?></div>
        <a class="back-box" href="./"><span> <?= SVG_CLOSE ?></span></a>
    </div>
</div>

<!-- call of the the js script for promo calculation with countdown -->
<script src="js/date.js"></script>