<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_create_img) ? $error_create_img : '' ?></p>
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
        <div  class="d-flex flex-column m-3">
                <img class="img-thumbnail" src="img/<?= $item['name_img'] ?>" alt="">
                <a class="btn btn-outline-danger mx-auto  my-3 btn-lg font-weight-bold"
                   href="?p=delete.img.admin&id=<?= $item['id_img'] ?>">
                    DELETE
                </a>
        </div>
    <?php } ?>
</div>