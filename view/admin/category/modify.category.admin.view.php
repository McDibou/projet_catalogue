<!-- admin modify categories view page -->
<title>Guit.dev - CRUD Category</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_category) ? $error_modify_category : '' ?>
    </p>
</div>

<!-- redirection button to the create categories page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.category.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <!-- categories modify form-->
            <form method="post">
                <div class="form-group">
                    <label class="m-2" for="title_category">Category</label>
                    <input id="title_category" class="form-control" name="name_category" type="text"
                           value="<?= $view_modify['name_category'] ?>" maxlength="80"
                           pattern="[A-Za-z0-9 '-]+$"
                           placeholder="max : 80"
                           required>
                    <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                            type="submit" name="modify_category">
                        MODIFY
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>