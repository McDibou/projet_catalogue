<!-- admin modify article view page -->
<title>Guit.dev - CRUD Article</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
    </p>
</div>

<!-- redirection button to the create shop page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">

        <div class="col-4 m-5">

            <!-- article modify form-->
            <form method="post">

                <div class="form-group">
                    <label class="m-2" for="title_article">Title :</label>
                    <input class="form-control" id="title_article" name="title_article" type="text"
                           value="<?= $view_modify['title_article'] ?>"
                           maxlength="80"
                           placeholder="max : 80"
                           pattern="[A-Za-z0-9 '-]+$"
                           required>
                </div>

                <div class="input-group">
                    <input class="form-control" id="price_article"
                           value="<?= $view_modify['price_article'] ?>"
                           name="price_article"
                           type="text"
                           placeholder="0.00"
                           pattern="[0-9]+\.[0-9]{2}"
                           required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="m-2" for="content_article">Description :</label>
                    <textarea style="resize: none" class="form-control" rows="5" id="content_article"
                              name="content_article"
                              placeholder="description"><?= $view_modify['content_article'] ?></textarea>
                </div>

                <button class="btn btn-outline-success col-8 mx-auto my-3 btn-lg btn-block font-weight-bold"
                        type="submit"
                        name="modify_article">
                    MODIFY
                </button>
            </form>
        </div>

        <!-- display of the current article with the `cardModel()` function defined in the page `card.model.php` -->
        <div class=" m-5 ">
            <div id="article" class="card" style="z-index: 1">
                <?= cardModel($article) ?>
            </div>
        </div>

    </div>
</div>

<!-- call of the the js script for promo calculation with countdown -->
<script src="js/date.js"></script>