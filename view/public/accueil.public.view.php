<div class="body-accueil">
    <img src="img/src/accueil.jpg" alt="">
</div>
<h1 class="title-accueil">GUIT.DEV</h1>
<p class="intro-accueil">
    "Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    Asperiores aut culpa dolorem dolores ducimus ex ipsam maxime odio,
    optio possimus quibusdam reiciendis sed totam, voluptas voluptatum.
    Delectus facere fuga tenetur."
</p>
<div class="card-promo">
    <?php foreach ($promo as $item) { ?>
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

<?php foreach ($show as $item) { ?>
    <div id="article" class="show">
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
        <div class="link">SHOW.ARTICLE</div>
    </div>
<?php } ?>
