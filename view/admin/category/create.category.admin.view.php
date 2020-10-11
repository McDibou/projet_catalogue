<ul>
    <li>
        <a href="?p=create.article.admin">create.article.admin</a>
    </li>
</ul>

<form method="post">
    <input value="<?= !empty($name_category) ? $name_category : ''; ?>" name="name_category" type="text" placeholder="Titre" required>
    <button type="submit" name="create_category">create</button>
</form>
<?= !empty( $error_create_category) ?  $error_create_category : '' ?>
<?= !empty( $error_delete_category) ?  $error_delete_category : '' ?>

<table>
    <thead>
    <tr>
        <th>id</th>
        <th>price</th>
        <th></th>
    </tr>
    </thead>

    <?php while ($item = mysqli_fetch_assoc($category)) { ?>
        <tbody>
        <tr>
            <th><?= $item['id_category'] ?></th>
            <th><?= $item['name_category'] ?></th>

            <th>
                <a href="?p=modify.category.admin&id=<?= $item['id_category'] ?>">modify</a>
                <a href="?p=delete.category.admin&id=<?= $item['id_category'] ?>">delete</a>
            </th>
        </tr>
        </tbody>
    <?php } ?>
</table>