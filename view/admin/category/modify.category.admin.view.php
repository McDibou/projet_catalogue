<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p>
        <?= !empty($error_modify_category) ? $error_modify_category : '' ?>
    </p>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <div class="form-group">
                    <label class="m-2" for="title_category">Category</label>
                    <input id="title_category" class="form-control" name="name_category" type="text"
                           value="<?= $view_modify['name_category'] ?>" placeholder="name"
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