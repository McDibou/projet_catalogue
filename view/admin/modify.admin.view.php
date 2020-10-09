
<form method="post">
    <input type="text" value="<?= $view_modify['title_article'] ?>" placeholder="Titre" required>
    <input type="text" value="<?= $view_modify['price_article'] ?>" placeholder="price" required>
    <input type="text" value="<?= $view_modify['promo_article'] ?>" placeholder="promo" required>
    <textarea placeholder="description"><?= $view_modify['content_article'] ?></textarea>
    <button type="submit" name="modify_article">create</button>
</form>