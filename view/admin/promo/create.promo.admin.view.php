<form method="post">
    <input value="<?= !empty($readPromo['promo_article']) ? $readPromo['promo_article'] : '' ?>" name="promo_article"
           type="text"
           placeholder="promo" required>
    <?= ($readPromo['promo_article'] !== '0') ? $readPromo['date_promo_article'] : '' ?>
    <input name="date_promo" type="text"
           placeholder="nbr date promo" required>
    <button type="submit" name="create_promo">promo</button>
</form>

<a href="?p=delete.promo.admin&id=<?= $readPromo['id_article'] ?>">delete .promo</a>

<?= !empty($error_create_promo) ? $error_create_promo : '' ?>
