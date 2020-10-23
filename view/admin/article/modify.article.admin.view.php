<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
    </p>
</div>

<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">
        <div class="col-4 m-5">
            <form method="post">
                <div class="form-group">
                    <label class="m-2" for="title_article">TITLE</label>
                    <input class="form-control" id="title_article" name="title_article" type="text"
                           value="<?= $view_modify['title_article'] ?>"
                           placeholder="Titre"
                           required>
                </div>


                <div class="input-group">
                    <input class="form-control" id="price_article"
                           value="<?= $view_modify['price_article'] ?>"
                           name="price_article" type="text"
                           placeholder="price" required>
                    <div class="input-group-prepend">
                        <span class="input-group-text">€</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="m-2" for="content_article">DESCRIPTION</label>
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
            <div id="article" class="card">

                <div class="title">
                    <h2>GUIT.DEV/</h2>
                    <h5><?= $view_modify['title_article'] ?></h5>
                </div>
                <div class="category">
                    <?php foreach ($category as $cat ) { ?>
                        <div><?= $cat['name_category'] ?></div>
                    <?php } ?>
                </div>
                <div class="desc">
                    <pre><?= $view_modify['content_article'] ?></pre>
                </div>
                <div>
                    <p id="prix"><?= $view_modify['price_article'] ?> €</p>
                    <p id="promo"><?= ($view_modify['promo_article'] !== '0') ? 'SAVE ' . $view_modify['promo_article'] . '%' : ''; ?></p>
                </div>
                <a class="link-pay" href="">ADD TO CARD</a>

                <div class="img">
                    <?php foreach ($img as $affiche) { ?>
                        <img class="img2" src="img/<?= $affiche['name_img'] ?>">
                        <img class="img1" src="img/<?= $affiche['name_img'] ?>">
                    <?php } ?>
                </div>
                <input id="id-article" value="<?= $view_modify['id_article'] ?>" type="hidden">
            </div>
        </div>
    </div>
</div>