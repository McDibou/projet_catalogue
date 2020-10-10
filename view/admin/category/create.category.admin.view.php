<ul>
    <li>
        <a href="?p=create.article.admin">create.article.admin</a>
    </li>
</ul>

<form method="post">
    <input name="name_category" type="text" placeholder="Titre" required>
    <button type="submit" name="create_category">create</button>
</form>

<hr>

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

            <td>
                <a href="?p=modify.category.admin&id=<?= $item['id_category'] ?>">modify</a>
                <a href="?p=delete.category.admin&id=<?= $item['id_category'] ?>">delete</a>
            </td>
        </tr>
        </tbody>
    <?php } ?>
</table>