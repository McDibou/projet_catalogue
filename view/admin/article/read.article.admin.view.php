<div class="p-5"></div><div class="p-5"></div><div class="p-5"></div>
<div class="py-3"></div>

<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
        </svg>
    </a>
</div>

<div id="article" class="card" style="z-index: 1;">
    <?= cardModel($article) ?>
</div>

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
            <?php if ($article['promo_article'] !== '0') { ?>
                <a class="btn btn-outline-warning m-2 font-weight-bold"
                   href="?p=create.promo.admin&id=<?= $article['id_article'] ?>">
                    MODIFY PROMOTION
                </a>
                <a class="btn btn-outline-danger m-2 font-weight-bold"
                   href="?p=delete.promo.admin&id=<?= $article['id_article'] ?>">
                    DELETE PROMOTION
                </a>
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