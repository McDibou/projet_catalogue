<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <?= !empty($error_category_article) ? $error_category_article : ''; ?></p>
</div>

<div class="position-fixed" style="top: 3rem; left: 10rem">
    <a class="btn btn-outline-dark" href="?p=create.article.admin">
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

