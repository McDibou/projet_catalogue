<div class="p-5"></div><div class="p-5"></div>
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_create_img) ? $error_create_img : '' ?></p>
</div>

<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
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

            <form method="post" enctype="multipart/form-data">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input class="custom-file-input" name="name_img" type="file" accept="image/*"
                               required>
                        <label class="custom-file-label" for="inputGroupFile01">Choose image</label>
                    </div>
                </div>
                <button class="btn btn-outline-success col-4 mx-auto my-3 btn-lg btn-block font-weight-bold"
                        type="submit" name="create_img">
                    ADD IMAGE
                </button>
            </form>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <?php foreach ($img as $item) { ?>
        <div class="d-flex flex-column m-3">
            <img class="img-thumbnail" src="img/original/<?= $item['name_img'] ?>" alt="">
            <a class="btn btn-outline-danger mx-auto  my-3 btn-lg font-weight-bold"
               href="?p=delete.img.admin&id=<?= $item['id_img'] ?>">
                DELETE
            </a>
        </div>
    <?php } ?>
</div>