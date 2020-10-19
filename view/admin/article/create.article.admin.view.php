<ul>
    <li>
        <a href="?p=create.category.admin">create.category.admin</a>
    </li>
</ul>

<form method="post" enctype="multipart/form-data">
    <input name="name_img" id="name_img" type="file" accept="image/*" required>

    <input value="<?= !empty($title_article) ? $title_article : ''; ?>" name="title_article" type="text"
           placeholder="Titre" required>
    <input value="<?= !empty($price_article) ? $price_article : ''; ?>" name="price_article" type="text"
           placeholder="price" required>

    <select name="category_id[]" required multiple="multiple">
        <option value="">--choose category--</option>
        <?php foreach ($category as $item) { ?>
            <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
        <?php } ?>
    </select>

    <textarea name="content_article" id="" cols="30" rows="10"
              placeholder="description"><?= !empty($content_article) ? $content_article : ''; ?></textarea>

    <button type="submit" name="create_article">create</button>
</form>

<p><?= (!empty($error_create_article)) ? $error_create_article : '' ?></p>

<hr>

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
