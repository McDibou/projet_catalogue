<!-- admin add category view page -->
<title>Guit.dev - CRUD Category</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_create_category) ? $error_create_category : '' ?>
        <?= (!empty($error_message)) ? $error_message : '' ?>
    </p>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <!-- category add form-->
            <form method="post">

                <div class="form-group">
                    <label class="m-2" for="title_category">Category</label>
                    <input class="form-control" id="title_category"
                           value="<?= !empty($name_category) ? $name_category : ''; ?>"
                           name="name_category" type="text"
                           maxlength="80"
                           pattern="[A-Za-z0-9 '-]+$"
                           placeholder="max : 80" required>
                </div>

                <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                        type="submit" name="create_category">
                    CREATE
                </button>

            </form>

        </div>
    </div>
</div>

<!-- div used to offset the content -->
<div class="py-3"></div>

<!-- if there are many categories in the database -->
<?php if ($countCategory !== 0) { ?>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-4">

                <table class="table table-bordered text-center bg-white">
                    <thead>
                    <tr>
                        <th>CATEGORY</th>
                        <th></th>
                    </tr>
                    </thead>

                    <!-- loop that recovers the category from the database with their modify and delete buttons -->
                    <?php foreach ($category as $item) { ?>
                        <tbody>
                        <tr>
                            <th class="align-middle"><?= $item['name_category'] ?></th>

                            <th class="align-middle">
                                <a class="btn btn-outline-warning"
                                   href="?p=modify.category.admin&id=<?= $item['id_category'] ?>">
                                    MODIFY
                                </a>
                                <a id="delete-confirm" class="btn btn-outline-danger"
                                   href="?p=delete.category.admin&id=<?= $item['id_category'] ?>">
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
    <!-- else displays a message -->
<?php } else { ?>
    <div class="text-center mx-auto font-weight-bold">No category, please add one</div>
<?php } ?>