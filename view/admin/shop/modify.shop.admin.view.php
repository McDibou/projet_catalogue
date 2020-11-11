<!-- admin modify shop view page -->
<title>Guit.dev - CRUD Shop</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
    </p>
</div>

<!-- redirection button to the create shop page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.shop.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">
        <div class="col-4 m-5">

            <!-- shop modify form-->
            <form method="post">

                <div class="form-group">
                    <label class="m-2" for="name_shop">Name :</label>
                    <input class="form-control" id="name_shop" value="<?= $view_modify['name_shop'] ?>"
                           name="name_shop"
                           type="text"
                           pattern="[A-Za-z0-9 '-]+$"
                           maxlength="80"
                           placeholder="max : 80"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="location_shop">Location :</label>
                    <input class="form-control" id="location_shop"
                           value="<?= $view_modify['localisation_shop'] ?>"
                           name="localisation_shop"
                           pattern="[0-9]{1,2})+(\.[0-9]{1,5}),([0-9]{1,2})+(\.[0-9]{1,5}"
                           type="text"
                           placeholder="ex : 50.82198,4.30070"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="city_shop">City :</label>
                    <input class="form-control" id="city_shop"
                           value="<?= $view_modify['ville_shop'] ?>" name="ville_shop"
                           type="text"
                           pattern="[A-Za-z0-9 '-]+$"
                           maxlength="80"
                           placeholder="max : 80"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="desc_shop">Address :</label>
                    <textarea style="resize: none" class="form-control" name="desc_shop" id="desc_shop" cols="30"
                              rows="4" pattern="[A-Za-z0-9 '-]+$"
                              placeholder="street, number, zip code, city, country"><?= $view_modify['desc_shop'] ?></textarea>
                </div>


                <button class="btn btn-outline-success col-6 my-3 btn-lg btn-block mx-auto font-weight-bold"
                        type="submit" name="modify_shop">
                    MODIFY
                </button>

            </form>
        </div>
    </div>
</div>