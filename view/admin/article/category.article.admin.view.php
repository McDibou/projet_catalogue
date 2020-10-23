<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p><?= !empty($error_category_article) ? $error_category_article : ''; ?></p>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="post">
                <ul class="list-group">
                    <?php foreach ($category as $item) { ?>
                        <li class="list-group-item px-5">
                            <div class=" checkbox">
                                <label class="form-check-label">
                                    <input
                                            class="form-check-input"
                                            type="checkbox"
                                            name="category[]"
                                            value="<?= $item['id_category'] ?>"
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

