<form method="post">
    <input type="file" accept="image/*" required>
    <input type="text" placeholder="Titre" required>
    <input type="text" placeholder="price" required>
    <input type="text" placeholder="promo" required>
    <textarea name="" id="" cols="30" rows="10" placeholder="description"></textarea>
    <button type="submit" name="new_article">create</button>
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
            <th><?= $item['name_img'] ?></th>
            <th><?= $item['date_article']?></th>

            <td>
                <form method="post">
                    <button type="submit">show</button>
                    <a href="?p=modify.admin&id=<?= $item['id_article'] ?>">modify</a>
                    <button type="submit">delete</button>
                </form>
            </td>
        </tr>
        </tbody>
    <?php } ?>
</table>

