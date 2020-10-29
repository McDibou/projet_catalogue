<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
    <p><?= (!empty($error_create_article)) ? $error_create_article : '' ?></p>
</div>

<div class="container">
    <div class="row-10">
        <form method="post" enctype="multipart/form-data">
            <div class="d-flex justify-content-center align-items-center">

                <div class="col-6">
                    <div class="form-group">
                        <label class="m-2" for="title_article">Title :</label>
                        <input class="form-control"
                               id="title_article"
                               value="<?= !empty($title_article) ? $title_article : ''; ?>"
                               name="title_article"
                               type="text"
                               maxlength="80"
                               placeholder="max : 80"
                               pattern="[A-Za-z0-9 '-]+$"
                               required>
                    </div>

                    <div class="form-group">
                        <label class="m-2" for="name_category">Category :</label>
                        <select class="form-control" id="name_category" name="category_id[]" required
                                multiple="multiple">
                            <?php foreach ($category as $item) { ?>
                                <option value="<?= $item['id_category'] ?>"><?= $item['name_category'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="input-group">
                        <input class="form-control"
                               id="price_article"
                               value="<?= !empty($price_article) ? $price_article : ''; ?>"
                               name="price_article"
                               type="text"
                               placeholder="0.00"
                               pattern="[0-9]+\.[0-9]{2}"
                               required>
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label class="m-2" for="content_article">Description :</label>
                        <textarea style="resize: none"
                                  class="form-control"
                                  id="content_article"
                                  name="content_article"
                                  cols="30"
                                  rows="8"
                                  maxlength="255"
                                  pattern="[A-Za-z0-9]+$"
                                  placeholder=""
                                  required><?= !empty($content_article) ? $content_article : ''; ?></textarea>
                    </div>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input class="custom-file-input"
                                   name="name_img"
                                   type="file"
                                   accept=".jpg, .jpeg, .png"
                                   required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                        </div>
                    </div>
                </div>

            </div>
            <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold" type="submit"
                    name="create_article">CREATE
            </button>

        </form>
    </div>
</div>

<div class="py-3"></div>

<div class="container-fluid my-5">
    <div class="row justify-content-center">
        <form method="post" action="?p=delete.all.article.admin">
            <table class="table table-bordered text-center bg-white">
                <thead>
                <tr>
                    <th></th>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>PRICE</th>
                    <th colspan="2">CATEGORY</th>
                    <th colspan="2">PROMOTION</th>
                    <th colspan="2">IMAGE</th>
                    <th>SHOW</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($article as $item) { ?>

                    <tr>
                        <th class="align-middle"><input type="checkbox" name="article_all_id[]"
                                                        value="<?= $item['id_article'] ?>"></th>
                        <th class="align-middle"><?= $item['id_article'] ?></th>
                        <th class="align-middle"><?= $item['title_article'] ?></th>
                        <th class="align-middle"><?= $item['price_article'] ?> €</th>

                        <?php $category = readCategoryArticle($item['id_article'], $db); ?>
                        <th class="align-middle">
                            <?php foreach ($category as $name) { ?>
                                <?= $name['name_category'] ?>
                            <?php } ?>
                        </th>
                        <th>
                            <a class="btn btn-outline-warning"
                               href="?p=category.article.admin&id=<?= $item['id_article'] ?>">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                        </th>
                        <th class="align-middle">
                            <?= ($item['promo_article'] !== '0') ? '<em>' . $item['promo_article'] . '%</em> / ' . $item['date_promo_article'] : '-' ?>
                        </th>
                        <th>
                            <?php if ($item['promo_article'] !== '0') { ?>
                                <a class="btn btn-outline-warning"
                                   href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                    </svg>
                                </a>
                                <a class="btn btn-outline-danger"
                                   href="?p=delete.promo.admin&id=<?= $item['id_article'] ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z"/>
                                    </svg>
                                </a>
                            <?php } else { ?>
                                <a class="btn btn-outline-success"
                                   href="?p=create.promo.admin&id=<?= $item['id_article'] ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                                    </svg>
                                </a>
                            <?php } ?>
                        </th>
                        <th class="align-middle">
                            <?php $readImg = readImg($db, $item['id_article']); ?>
                            <?php foreach ($readImg as $img) { ?>
                                <img style="height: 2.5rem" class="img-thumbnail rounded"
                                     src="img/thumb/<?= $img['name_img'] ?>" alt="">
                            <?php } ?>
                        </th>
                        <th>
                            <a class="btn btn-outline-warning" href="?p=create.img.admin&id=<?= $item['id_article'] ?>">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil"
                                     fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                          d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
                                </svg>
                            </a>
                        </th>
                        <th class="align-middle">
                            <?php if ($item['show_article'] === '0') { ?>
                                <a class="btn btn-outline-danger"
                                   href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </a>
                            <?php } else { ?>
                                <a class="btn btn-outline-success"
                                   href="?p=show.article.admin&id=<?= $item['id_article'] ?>&show=<?= $item['show_article'] ?>">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check"
                                         fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                    </svg>
                                </a>
                            <?php } ?>
                        </th>
                        <th class="align-middle">
                            <a class="btn btn-outline-success font-weight-bold"
                               href="?p=read.article.admin&id=<?= $item['id_article'] ?>">
                                READ
                            </a>
                            <a class="btn btn-outline-warning font-weight-bold"
                               href="?p=modify.article.admin&id=<?= $item['id_article'] ?>">
                                MODIFY
                            </a>
                            <a class="btn btn-outline-danger font-weight-bold"
                               href="?p=delete.article.admin&id=<?= $item['id_article'] ?>">
                                DELETE
                            </a>
                        </th>
                    </tr>

                <?php } ?>
                </tbody>
            </table>
            <button class="btn btn-outline-danger col-2 mx-3 my-1 font-weight-bold" type="submit" name="article_all">
                DELETE ALL
            </button>
        </form>
    </div>
</div>