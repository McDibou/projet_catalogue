<!-- admin read article view page -->
<title>Guit.dev - CRUD Article</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>
<div class="py-3"></div>

<!-- redirection button to the create shop page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<!-- display of the current article with the `cardModel()` function defined in the page `card.model.php` -->
<div class="admin-card">
    <div id="article" class="card" style="z-index: 1;">
        <?= cardModel($article) ?>
    </div>
</div>

<!-- div with CRUD button of the current article -->
<div class="container-fluid">
    <div class="d-flex justify-content-center flex-column m-5">
        <div class="mx-auto">

            <a class="btn btn-outline-warning m-2 font-weight-bold"
               href="?p=category.article.admin&id=<?= $article['id_article'] ?>">
                MODIFY CATEGORY
            </a>

            <a class="btn btn-outline-warning m-2 font-weight-bold"
               href="?p=create.img.admin&id=<?= $article['id_article'] ?>">
                MODIFY IMAGE
            </a>

            <a class="btn btn-outline-warning m-2 font-weight-bold"
               href="?p=modify.article.admin&id=<?= $article['id_article'] ?>">
                MODIFY ARTICLE
            </a>

        </div>
        <div class="mx-auto">

            <!-- if the article has a promo display button modify and delete -->
            <?php if ($article['promo_article'] !== '0') { ?>

                <a class="btn btn-outline-warning m-2 font-weight-bold"
                   href="?p=create.promo.admin&id=<?= $article['id_article'] ?>">
                    MODIFY PROMOTION
                </a>
                <a class="btn btn-outline-danger m-2 font-weight-bold"
                   href="?p=delete.promo.admin&id=<?= $article['id_article'] ?>">
                    DELETE PROMOTION
                </a>

                <!-- else add button add promo -->
            <?php } else { ?>

                <a class="btn btn-outline-success m-2 font-weight-bold"
                   href="?p=create.promo.admin&id=<?= $article['id_article'] ?>">
                    ADD PROMOTION
                </a>

            <?php } ?>


            <a class="btn btn-outline-danger m-2 font-weight-bold"
               href="?p=delete.article.admin&id=<?= $article['id_article'] ?>">
                DELETE ARTICLE
            </a>

        </div>
    </div>
</div>

<!-- call of the the js script for promo calculation with countdown -->
<script src="js/date.js"></script>