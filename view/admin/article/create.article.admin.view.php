<div class="p-5"></div><div class="p-5"></div>
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= (!empty($error_create_article)) ? $error_create_article : '' ?>
    </p>
</div>


<div class="container">
    <div class="row-10">
        <div class="form-row justify-content-end mr-5">
            <form class="form-group d-flex" method="post" action="?p=random.article.admin">
                <label class="mt-2 col-8 text-muted font-italic" for="nbr-article">number of article to be randomly
                    created : </label>
                <input class="form-control col-2 mr-2" id="nbr-article" name="nbr_article" step="5" min="0" max="50"
                       placeholder="0" type="number">
                <button class="btn btn-outline-success" name="create_random" type="submit">CREATE</button>
            </form>
        </div>
        <form method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center">

                <div class="col-6">
                    <div class="form-group">
                        <label class="m-2" for="title_article">Title :</label>
                        <input class="form-control"
                               id="title_article"
                               value="<?= !empty($title_article) ? $title_article : ''; ?>"
                               name="title_article"
                               type="text"
                               maxlength="80"
                               placeholder="max : 80"
                               pattern="[A-Za-z0-9 '-]+$"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="name_category">Category :</label>
                        <select class="form-control" id="name_category" name="category_id[]" required
                                multiple="multiple">
                            <?php if ($countCategory !== 0) { ?>
                                <?php foreach ($category as $item) { ?>
                                    <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
                                <?php } ?>
                            <?php } else { ?>
                                <option disabled class="placeholder" style="margin-top: 0.5rem">Please fill in the
                                    categories before
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <input class="form-control"
                               id="price_article"
                               value="<?= !empty($price_article) ? $price_article : ''; ?>"
                               name="price_article"
                               type="text"
                               placeholder="0.00"
                               pattern="[0-9]+\.[0-9]{2}"
                               required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="m-2" for="content_article">Description :</label>
                        <textarea style="resize: none"
                                  class="form-control"
                                  id="content_article"
                                  name="content_article"
                                  cols="30"
                                  rows="8"
                                  maxlength="255"
                                  pattern="[A-Za-z0-9]+$"
                                  placeholder="
Frets : 24
Color body : none
Size : 1/2
Wood : rosewood"
                                  required><?= !empty($content_article) ? $content_article : ''; ?></textarea>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input class="custom-file-input"
                                   name="name_img"
                                   type="file"
                                   accept=".jpg, .jpeg, .png"
                                   required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                        </div>
                    </div>
                </div>

            </div>
            <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold" type="submit"
                    name="create_article">CREATE
            </button>

        </form>
    </div>
</div>

<div class="py-3"></div>

<?php if ($countArticle !== 0) { ?>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <form method="post" action="?p=delete.all.article.admin">
                <table class="table table-bordered text-center bg-white">
                    <thead>
                    <tr>
                        <?php if ($countArticle > 1) { ?>
                            <th></th>
                        <?php } ?>
                        <th>ID</th>
                        <th>TITLE</th>
                        <th>PRICE</th>
                        <th colspan="2">CATEGORY</th>
                        <th colspan="2">PROMOTION</th>
                        <th colspan="2">IMAGE</th>
                        <th>SHOW</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($article as $item) { ?>

                        <tr>
                            <?php if ($countArticle > 1) { ?>
                                <th class="align-middle"><input type="checkbox" name="article_all_id[]"
                                                                value="<?= $item['id_article'] ?>"></th>
                            <?php } ?>
                            <th class="align-middle"><?= $item['id_article'] ?></th>
                            <th class="align-middle"><?= $item['title_article'] ?></th>
                            <th class="align-middle"><?= $item['price_article'] ?> €</th>

                            <?php $category = readCategoryArticle($item['id_article'], $db); ?>
                            <th class="align-middle">
                                <?php foreach ($category as $name) { ?>
                                    <?= $name['name_category'] ?>
                                <?php } ?>
                            </th>
                            <th>
                                <a class="btn btn-outline-warning"
                                   href="?p=category.article.admin&id=<?= $item['id_article'] ?>">
                                    <span><?= SVG_READ ?></span>
                                </a>
                            </th>
                            <th class="align-middle">
                                <?= ($item['promo_article'] !== '0') ? '<em>' . $item['promo_article'] . '%</em> / ' . $item['date_promo_article'] : '-' ?>
                            </th>
                            <th>
                                <?php if ($item['promo_article'] !== '0') { ?>
                                    <a class="btn btn-outline-warning"
                                       href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">
                                        <span><?= SVG_READ ?></span>
                                    </a>
                                    <a class="btn btn-outline-danger"
                                       href="?p=delete.promo.admin&id=<?= $item['id_article'] ?>">
                                        <span><?= SVG_DELETE ?></span>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-outline-success"
                                       href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">
                                        <span><?= SVG_CREATE ?></span>
                                    </a>
                                <?php } ?>
                            </th>
                            <th class="align-middle">
                                <?php $readImg = readImg($db, $item['id_article']); ?>
                                <?php foreach ($readImg as $img) { ?>
                                    <img style="height: 2.5rem" class="img-thumbnail rounded"
                                         src="img/thumb/<?= $img['name_img'] ?>" alt="">
                                <?php } ?>
                            </th>
                            <th>
                                <a class="btn btn-outline-warning"
                                   href="?p=create.img.admin&id=<?= $item['id_article'] ?>">
                                    <span><?= SVG_READ ?></span>
                                </a>
                            </th>
                            <th class="align-middle">
                                <?php if ($item['show_article'] === '0') { ?>
                                    <a class="btn btn-outline-danger"
                                       href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">
                                        <span><?= SVG_NOT_SHOW ?></span>
                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-outline-success"
                                       href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">
                                        <span><?= SVG_SHOW ?></span>
                                    </a>
                                <?php } ?>
                            </th>
                            <th class="align-middle">
                                <a class="btn btn-outline-success font-weight-bold"
                                   href="?p=read.article.admin&id=<?= $item['id_article'] ?>">
                                    READ
                                </a>
                                <a class="btn btn-outline-warning font-weight-bold"
                                   href="?p=modify.article.admin&id=<?= $item['id_article'] ?>">
                                    MODIFY
                                </a>
                                <a class="btn btn-outline-danger font-weight-bold"
                                   href="?p=delete.article.admin&id=<?= $item['id_article'] ?>">
                                    DELETE
                                </a>
                            </th>
                        </tr>

                    <?php } ?>
                    </tbody>
                </table>

                <div class="d-flex justify-content-between" style="height: 2.5rem">
                    <?php if ($countArticle > 1) { ?>
                        <button class="btn btn-outline-danger col-2 ml-5 font-weight-bold" type="submit"
                                name="article_all">
                            DELETE ALL
                        </button>
                    <?php } ?>
                    <div class="d-inline mr-5"><?= $switchArticle ?></div>
                </div>

            </form>
        </div>
    </div>
<?php } else { ?>
    <div class="text-center mx-auto font-weight-bold">No article, please add one</div>
<?php } ?>