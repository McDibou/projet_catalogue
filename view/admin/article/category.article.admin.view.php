<form method="post">

    <?php foreach ($category as $item) { ?>
        <div>
            <input
                    type="checkbox"
                    name="category[]"
                    value="<?= $item['id_category'] ?>"
                <?php foreach ($checked as $checkout) {
                    echo ($item['id_category'] == $checkout['id_category']) ? 'checked' : '';
                } ?>
            >

            <?= $item['name_category'] ?>
        </div>
    <?php } ?>

    <button type="submit" name="modify_catalog">modify</button>

</form>

<?= !empty($error_category_article) ? $error_category_article : ''; ?>