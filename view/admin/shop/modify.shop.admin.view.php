<form method="post">

    <input name="name_shop" type="text" value="<?= $view_modify['name_shop'] ?>" placeholder="name_shop" required>
    <input name="localisation_shop" type="text" value="<?= $view_modify['localisation_shop'] ?>" placeholder="localisation_shop" required>
    <input name="ville_shop" type="text" value="<?= $view_modify['ville_shop'] ?>" placeholder="ville_shop" required>

    <textarea name="desc_shop" placeholder="description"><?= $view_modify['desc_shop'] ?></textarea>

    <button type="submit" name="modify_shop">modify</button>

    <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
</form>