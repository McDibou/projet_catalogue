<ul>
    <li>
        <a href="?p=create.category.admin">create.category.admin</a>
    </li>
</ul>

<form method="post" enctype="multipart/form-data">
    <input name="name_img" id="name_img" type="file" accept="image/*" required>
    <input name="title_article" type="text" placeholder="Titre" required>
    <input name="price_article" type="text" placeholder="price" required>
    <input name="promo_article" type="text" placeholder="promo" required>
    <select name="category_id" required>
        <option value="">--choose option--</option>
        <?php while ($item = mysqli_fetch_assoc($category)) { ?>
            <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
        <?php } ?>
    </select>
    <textarea name="content_article" id="" cols="30" rows="10" placeholder="description"></textarea>
    <button type="submit" name="create_article">create</button>
</form>

<hr>

<table>
    <thead>
    <tr>
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

    <?php while ($item = mysqli_fetch_assoc($article)) { ?>
        <tbody>
        <tr>
            <th><?= $item['id_article'] ?></th>
            <th><?= $item['title_article'] ?></th>
            <th><?= $item['price_article'] ?></th>
            <th><?= $item['name_category'] ?></th>
            <th><?= $item['promo_article'] ?></th>
            <th>
                <a href="?p=create.img.admin&id=<?= $item['id_article'] ?>">modify.img</a>
            </th>
            <th><?= $item['date_article'] ?></th>

            <td>
                <form method="post">
                    <?php if ($item['show_article'] === '0') { ?>
                        <a href="?p=show.article.admin&id=<?= $item['id_article'] ?>">on</a>
                    <?php } else { ?>
                        <a href="?p=show.article.admin&id=<?= $item['id_article'] ?>">off</a>
                    <?php } ?>
                    <a href="?p=read.article.admin&id=<?= $item['id_article'] ?>">read</a>
                    <a href="?p=modify.article.admin&id=<?= $item['id_article'] ?>">modify</a>
                    <a href="?p=delete.article.admin&id=<?= $item['id_article'] ?>">delete</a>
                </form>
            </td>
        </tr>
        </tbody>
    <?php } ?>
</table>

