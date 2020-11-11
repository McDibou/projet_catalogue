<!-- admin modify category for article view page -->
<title>Guit.dev - CRUD Article</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($not_field) ? $not_field : ''; ?>
        <?= !empty($error) ? $error : ''; ?></p>
</div>

<!-- redirection button to the create shop page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <!-- category modify form -->
            <form method="post">
                <ul class="list-group">

                    <!-- loop that recovers the categories -->
                    <?php foreach ($category as $item) { ?>
                        <li class="list-group-item px-5">
                            <div class=" checkbox">

                                <label class="form-check-label">
                                    <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="category[]"
                                            value="<?= $item['id_category'] ?>"
                                            <!-- loop that assigns `checked` to the checkbox if the category is linked to the current article -->
                                        <?php foreach ($checked as $checkout) {
                                            echo ($item['id_category'] == $checkout['id_category']) ? 'checked' : '';
                                        } ?>
                                    >

                                    <?= $item['name_category'] ?>

                                </label>

                            </div>
                        </li>
                    <?php } ?>

                </ul>

                <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                        type="submit" name="modify_catalog">
                    MODIFY
                </button>
            </form>

        </div>
    </div>
</div>

