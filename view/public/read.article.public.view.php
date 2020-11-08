<title>Guit.dev - Article <?= $item['title_article'] ?></title>
<div class="body-accueil img-catalog">
    <img src="img/src/accueil.jpg" alt="">
</div>
<div class="light"><img src="img/src/accueil.jpg" alt=""></div>
<div class="light-box" style="z-index: 3">
    <div class="box">
        <div id="article" class="card"> <?= cardModel($item) ?></div>
        <a class="back-box" href="./"><span> <?= SVG_CLOSE ?></span></a>
    </div>
</div>

<script src="js/date.js"></script>