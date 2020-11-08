<title>Guit.dev - CRUD Article</title>

<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
    </p>
</div>

<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
        </svg>
    </a>
</div>

<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">
        <div class="col-4 m-5">
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
        <div class=" m-5 ">
            <div id="article" class="card" style="z-index: 1">
                <?= cardModel($article) ?>
            </div>
        </div>
    </div>
</div>

<script src="js/date.js"></script>