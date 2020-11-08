<title>Guit.dev - CRUD Shop</title>

<div class="p-5"></div>
<div class="p-5"></div>
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p><?= !empty($error_shop) ? $error_shop : '' ?></p>
</div>
<div class="container-fluid">
    <div class="row row-col-2 d-flex justify-content-center ">
        <div class="col-4 m-5">
            <form method="post">

                <div class="form-group">
                    <label class="m-2" for="name_shop">Name :</label>
                    <input class="form-control" id="name_shop" value="<?= !empty($name_shop) ? $name_shop : ''; ?>"
                           name="name_shop"
                           type="text"
                           pattern="[A-Za-z0-9 '-]+$"
                           maxlength="80"
                           placeholder="max : 80" required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="location_shop">Location :</label>
                    <input class="form-control" id="location_shop"
                           value="<?= !empty($localisation_shop) ? $localisation_shop : ''; ?>"
                           name="localisation_shop"
                           pattern="[0-9]{1,2})+(\.[0-9]),([0-9]{1,2})+(\.[0-9])"
                           type="text"
                           placeholder="ex : 50.82198,4.30070" required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="city_shop">City :</label>
                    <input class="form-control" id="city_shop"
                           value="<?= !empty($ville_shop) ? $ville_shop : ''; ?>" name="ville_shop"
                           type="text"
                           pattern="[A-Za-z0-9 '-]+$"
                           maxlength="80"
                           placeholder="max : 80" required>
                </div>

                <div class="form-group">
                    <label class="m-2" for="desc_shop">Address :</label>
                    <textarea style="resize: none" class="form-control"
                              name="desc_shop"
                              id="desc_shop"
                              cols="30"
                              rows="4"
                              pattern="[A-Za-z0-9 '-]+$"
                              placeholder="street, number, zip code, city, country"><?= !empty($desc_shop) ? $desc_shop : ''; ?></textarea>
                </div>


                <button class="btn btn-outline-success col-6 my-3 btn-lg btn-block mx-auto font-weight-bold"
                        type="submit" name="create_shop">
                    CREATE
                </button>

            </form>
        </div>
        <div class=" m-5 ">
            <div class="img-thumbnail">
                <div class="p-1" id="mapid" style="height: 500px; width: 600px;"></div>
            </div>
        </div>
    </div>
</div>

<div class="py-3"></div>
<?php if ($countShop !== 0) { ?>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-10">
                <table class="table table-bordered text-center bg-light">
                    <thead>
                    <tr>
                        <th>NAME</th>
                        <th>LOCATION</th>
                        <th>CITY</th>
                        <th>ADDRESS</th>
                        <th></th>
                    </tr>
                    </thead>

                    <?php foreach ($shop as $item) { ?>
                        <tbody>
                        <tr>
                            <th class="align-middle"><?= $item['name_shop'] ?></th>
                            <th class="align-middle"><a class="text-reset"
                                                        href="?p=create.shop.admin&loc=<?= $item['localisation_shop'] ?>"><?= $item['localisation_shop'] ?>
                                    <sup><?= SVG_LINK ?></sup></a></th>
                            <th class="align-middle"><?= $item['ville_shop'] ?></th>
                            <th class="align-middle"><?= $item['desc_shop'] ?></th>

                            <th class="align-middle">
                                <a class="btn btn-outline-warning"
                                   href="?p=modify.shop.admin&id=<?= $item['id_shop'] ?>">
                                    MODIFY
                                </a>
                                <a class="btn btn-outline-danger"
                                   href="?p=delete.shop.admin&id=<?= $item['id_shop'] ?>">
                                    DELETE
                                </a>

                            </th>
                        </tr>
                        </tbody>
                    <?php } ?>

                </table>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="text-center mx-auto font-weight-bold">No shop, please add one</div>
<?php } ?>
<div class="py-3"></div>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="js/map.js"></script>