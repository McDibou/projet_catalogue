<div>
    <h1><?= $shop['name_shop'] ?></h1>
    <p><?= $shop['localisation_shop'] ?></p>
    <p><?= $shop['ville_shop'] ?></p>
    <p><?= $shop['desc_shop'] ?></p>
</div>

<div>
    <a href="?p=modify.shop.admin&id=<?= $shop['id_shop'] ?>">modify</a>
    <a href="?p=delete.shop.admin&id=<?= $shop['id_shop'] ?>">delete</a>
</div>