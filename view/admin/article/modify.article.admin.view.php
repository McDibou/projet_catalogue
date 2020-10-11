<form method="post">

    <input name="title_article" type="text" value="<?= $view_modify['title_article'] ?>" placeholder="Titre" required>
    <input name="price_article" type="text" value="<?= $view_modify['price_article'] ?>" placeholder="price" required>
    <input name="promo_article" type="text" value="<?= $view_modify['promo_article'] ?>" placeholder="promo" required>

    <select name="category_id" required>
        <?php while ($item = mysqli_fetch_assoc($category)) { ?>
            <option value="<?= $item['id_category'] ?>"
                <?= $select = ($item['id_category'] === $view_modify['fkey_id_category']) ? "selected" : ""; ?>>
                <?= $item['name_category'] ?>
            </option>
        <?php } ?>
    </select>

    <textarea name="content_article" placeholder="description"><?= $view_modify['content_article'] ?></textarea>
    <button type="submit" name="modify_article">modify</button>

    <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
</form>