<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_article) ? $error_modify_article : ''; ?>
    </p>
</div>

<div class="position-fixed" style="top: 3rem; left: 10rem">
    <a class="btn btn-outline-dark" href="?p=create.shop.admin">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
        </svg>
    </a>
</div>

<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">
        <div class="col-4 m-5">
            <form method="post">

                <div class="form-group">
                    <label class="m-2" for="name_shop">NAME</label>
                    <input class="form-control" id="name_shop" value="<?= $view_modify['name_shop'] ?>"
                           name="name_shop"
                           type="text"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="location_shop">LOCATION</label>
                    <input class="form-control" id="location_shop"
                           value="<?= $view_modify['localisation_shop'] ?>"
                           name="localisation_shop"
                           type="text"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="city_shop">CITY</label>
                    <input class="form-control" id="city_shop"
                           value="<?= $view_modify['ville_shop'] ?>" name="ville_shop"
                           type="text"
                           required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="desc_shop">ADDRESS</label>
                    <textarea style="resize: none" class="form-control" name="desc_shop" id="desc_shop" cols="30"
                              rows="4"><?= $view_modify['desc_shop'] ?></textarea>
                </div>


                <button class="btn btn-outline-success col-6 my-3 btn-lg btn-block mx-auto font-weight-bold"
                        type="submit" name="modify_shop">
                    MODIFY
                </button>

            </form>
        </div>
    </div>
</div>