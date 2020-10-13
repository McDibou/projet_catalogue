<form method="post">

    <input name="title_article" type="text" value="<?= $view_modify['title_article'] ?>" placeholder="Titre" required>
    <input name="price_article" type="text" value="<?= $view_modify['price_article'] ?>" placeholder="price" required>
    <input name="promo_article" type="text" value="<?= $view_modify['promo_article'] ?>" placeholder="promo" required>
    <textarea name="content_article" placeholder="description"><?= $view_modify['content_article'] ?></textarea>
    <button type="submit" name="modify_article">modify</button>

    <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
</form>