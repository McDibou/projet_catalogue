<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p>
        <?= !empty($error_create_promo) ? $error_create_promo : '' ?>
    </p>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <div class="form-group">

                    <div class="input-group">
                        <input class="form-control"
                               value="<?= !empty($readPromo['promo_article']) ? $readPromo['promo_article'] : '' ?>"
                               name="promo_article"
                               type="text"
                               placeholder="promo" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="m-2"
                               for="date_promo">
                            <em><?= ($readPromo['promo_article'] !== '0') ? 'END OF PROMOTION : ' . $readPromo['date_promo_article'] : '' ?></em></label>
                        <input class="form-control" id="date_promo" name="date_promo" type="text"
                               placeholder="nbr date promo" required>
                    </div>
                    <div class="d-flex">
                        <?php if ($readPromo['promo_article'] == '0') { ?>
                            <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                                    type="submit" name="create_promo">
                                CREATE
                            </button>
                        <?php } else { ?>
                            <button class="btn btn-outline-warning col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                                    type="submit" name="create_promo">
                                MODIFY
                            </button>
                            <a class="btn btn-outline-danger col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                               href="?p=delete.promo.admin&id=<?= $readPromo['id_article'] ?>">
                                DELETE
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

