<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5"></div>
<div id="article" class="card">

    <div class="title">
        <h2>GUIT.DEV/</h2>
        <h5><?= $article['title_article'] ?></h5>
    </div>
    <div class="category">
        <?php foreach ($category as $cat) { ?>
            <div><?= $cat['name_category'] ?></div>
        <?php } ?>
    </div>
    <div class="desc">
        <pre><?= $article['content_article'] ?></pre>
    </div>
    <div>
        <p id="prix"><?= $article['price_article'] ?> €</p>
        <p id="promo"><?= ($article['promo_article'] !== '0') ? 'SAVE ' . $article['promo_article'] . '%' : ''; ?></p>
    </div>
    <a class="link-pay" href="">ADD TO CARD</a>

    <div class="img">
        <?php foreach ($img as $affiche) { ?>
            <img class="img2" src="img/<?= $affiche['name_img'] ?>">
            <img class="img1" src="img/<?= $affiche['name_img'] ?>">
        <?php } ?>
    </div>
    <input id="id-article" value="<?= $article['id_article'] ?>" type="hidden">
</div>

<div class="container-fluid">
    <div class="d-flex justify-content-center m-5">
        <a class="btn btn-outline-warning m-2"
           href="?p=category.article.admin&id=<?= $article['id_article'] ?>">
            MODIFY CATEGORY
        </a>
        <a class="btn btn-outline-warning m-2"
           href="?p=create.img.admin&id=<?= $article['id_article'] ?>">
            MODIFY IMAGE
        </a>
        <a class="btn btn-outline-warning m-2"
           href="?p=modify.article.admin&id=<?= $article['id_article'] ?>">
            MODIFY ARTICLE
        </a>

        <?php if ($article['promo_article'] !== '0') { ?>
            <a class="btn btn-outline-warning m-2"
               href="?p=create.promo.admin&id=<?= $article['id_article'] ?>">
                MODIFY PROMOTION
            </a>
            <a class="btn btn-outline-danger m-2"
               href="?p=delete.promo.admin&id=<?= $article['id_article'] ?>">
                DELETE PROMOTION
            </a>
        <?php } else { ?>
            <a class="btn btn-outline-success m-2"
               href="?p=create.promo.admin&id=<?= $article['id_article'] ?>">
                ADD PROMOTION
            </a>
        <?php } ?>

        <a class="btn btn-outline-danger m-2"
           href="?p=delete.article.admin&id=<?= $article['id_article'] ?>">
            DELETE ARTICLE
        </a>
    </div>
</div>