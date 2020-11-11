<!-- admin create promo view page -->
<title>Guit.dev - CRUD Promotion</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_create_promo) ? $error_create_promo : '' ?>
    </p>
</div>

<!-- redirection button to the create article page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <!-- shop modify form-->
            <form method="post">
                <div class="form-group">

                    <div class="input-group">
                        <input class="form-control"
                               value="<?= !empty($readPromo['promo_article']) ? $readPromo['promo_article'] : '' ?>"
                               name="promo_article"
                               type="text"
                               pattern="[0-9]+$"
                               placeholder="promo" required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="date_promo">

                            <!-- displays the date of the promo if it exists -->
                            <em><?= ($readPromo['promo_article'] !== '0') ? 'END OF PROMOTION : ' . $readPromo['date_promo_article'] : '' ?></em></label>

                        <input pattern="[0-9]+$" class="form-control" id="date_promo" name="date_promo" type="text"
                               placeholder="nbr date promo" required>
                    </div>

                    <div class="d-flex">

                        <!-- if the article does not have a promo display create button -->
                        <?php if ($readPromo['promo_article'] == '0') { ?>

                            <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                                    type="submit" name="create_promo">
                                CREATE
                            </button>

                            <!-- else add button modify and delete -->
                        <?php } else { ?>

                            <button class="btn btn-outline-warning col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                                    type="submit" name="create_promo">
                                MODIFY
                            </button>

                            <a id="delete-confirm"
                               class="btn btn-outline-danger col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
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