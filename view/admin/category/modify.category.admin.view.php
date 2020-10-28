<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_modify_category) ? $error_modify_category : '' ?>
    </p>
</div>

<div class="position-fixed" style="top: 3rem; left: 10rem">
    <a class="btn btn-outline-dark" href="?p=create.category.admin">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-left-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
        </svg>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
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