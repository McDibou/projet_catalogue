<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p><?= (!empty($error_create_article)) ? $error_create_article : '' ?></p>
</div>
<div class="container">
    <div class="row">
        <form method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center">

                <div class="col-6">
                    <div class="form-group">
                        <label class="m-2" for="title_article">Title</label>
                        <input class="form-control" id="title_article"
                               value="<?= !empty($title_article) ? $title_article : ''; ?>"
                               name="title_article" type="text"
                               placeholder="Titre" required>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="price_article">Price</label>
                        <input class="form-control" id="price_article"
                               value="<?= !empty($price_article) ? $price_article : ''; ?>"
                               name="price_article" type="text"
                               placeholder="price" required>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="name_category">Category</label>
                        <select class="form-control" id="name_category" name="category_id[]" required
                                multiple="multiple">
                            <?php foreach ($category as $item) { ?>
                                <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <input class="form-control-file" name="name_img" type="file" accept="image/*"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="content_article">Description</label>
                        <textarea class="form-control" id="content_article" name="content_article" id="" cols="30"
                                  rows="10"
                                  placeholder="description"><?= !empty($content_article) ? $content_article : ''; ?></textarea>
                    </div>
                </div>

            </div>
            <button class="btn btn-primary col-4 m-2" type="submit" name="create_article">CREATE</button>

        </form>
    </div>
</div>

<form method="post" action="?p=delete.all.article.admin">
    <table>
        <thead>
        <tr>
            <th></th>
            <th>id</th>
            <th>titre</th>
            <th>price</th>
            <th>category</th>
            <th>promo</th>
            <th>img</th>
            <th>date</th>
            <th></th>
        </tr>
        </thead>

        <?php foreach ($article as $item) { ?>
            <tbody>
            <tr>
                <th><input type="checkbox" name="article_all_id[]" value="<?= $item['id_article'] ?>"></th>
                <th><?= $item['id_article'] ?></th>
                <th><?= $item['title_article'] ?></th>
                <th><?= $item['price_article'] ?></th>

                <?php $category = readCategoryArticle($item['id_article'], $db); ?>
                <th>
                    <?php foreach ($category as $name) { ?>
                        <?= $name['name_category'] ?>
                    <?php } ?>
                    <a href="?p=category.article.admin&id=<?= $item['id_article'] ?>">modify.category</a>
                </th>

                <th>
                    <?php if ($item['promo_article'] !== '0') { ?>
                        <?= $item['promo_article'] ?>% /<?= $item['date_promo_article'] ?>
                        <a href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">modify.promo</a>
                        <a href="?p=delete.promo.admin&id=<?= $item['id_article'] ?>">delete .promo</a>
                    <?php } else { ?>
                        <a href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">add.promo</a>
                    <?php } ?>
                </th>
                <th>
                    <a href="?p=create.img.admin&id=<?= $item['id_article'] ?>">modify.img</a>
                </th>
                <th><?= $item['date_article'] ?></th>

                <td>

                    <?php if ($item['show_article'] === '0') { ?>
                        <a href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">OFF</a>
                    <?php } else { ?>
                        <a href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">ON</a>
                    <?php } ?>

                    <a href="?p=read.article.admin&id=<?= $item['id_article'] ?>">read</a>
                    <a href="?p=modify.article.admin&id=<?= $item['id_article'] ?>">modify</a>
                    <a href="?p=delete.article.admin&id=<?= $item['id_article'] ?>">delete</a>

                </td>
            </tr>
            </tbody>
        <?php } ?>

    </table>
    <button type="submit" name="article_all">delete all</button>
</form>
