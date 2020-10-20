<ul>
    <li>
        <a href="?p=create.article.admin">create.article.admin</a>
        <a href="?p=create.category.admin">create.category.admin</a>
        <a href="?p=create.shop.admin">create.shop.admin</a>
    </li>
</ul>

<form method="post">

    <input value="<?= !empty($name_shop) ? $name_shop : ''; ?>" name="name_shop" type="text"
           placeholder="name_shop" required>
    <input value="<?= !empty($localisation_shop) ? $localisation_shop : ''; ?>" name="localisation_shop" type="text"
           placeholder="localisation_shop" required>
    <input value="<?= !empty($ville_shop) ? $ville_shop : ''; ?>" name="ville_shop" type="text"
           placeholder="ville_shop" required>

    <textarea name="desc_shop" id="" cols="30" rows="10"
              placeholder="desc_shop"><?= !empty($desc_shop) ? $desc_shop : ''; ?></textarea>

    <button type="submit" name="create_shop">create</button>

</form>

<?= !empty($error_shop) ? $error_shop : '' ?>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>localisation</th>
        <th>ville</th>
        <th>desc</th>
    </tr>
    </thead>

    <?php foreach ($shop as $item) { ?>
        <tbody>
        <tr>

            <th><?= $item['id_shop'] ?></th>
            <th><?= $item['name_shop'] ?></th>
            <th><?= $item['localisation_shop'] ?></th>
            <th><?= $item['ville_shop'] ?></th>
            <th><?= $item['desc_shop'] ?></th>

            <td>

                <a href="?p=read.shop.admin&id=<?= $item['id_shop'] ?>">read</a>
                <a href="?p=modify.shop.admin&id=<?= $item['id_shop'] ?>">modify</a>
                <a href="?p=delete.shop.admin&id=<?= $item['id_shop'] ?>">delete</a>

            </td>
        </tr>
        </tbody>
    <?php } ?>

</table>
