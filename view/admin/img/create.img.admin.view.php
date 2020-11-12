<!-- admin add images view page -->
<title>Guit.dev - CRUD Image</title>

<!-- div used to offset the content -->
<div class="p-5"></div>
<div class="p-5"></div>

<!-- div with error if available -->
<div class="py-3">
    <p class="text-center mx-auto font-weight-bold text-danger">
        <?= !empty($error_create_img) ? $error_create_img : '' ?></p>
</div>

<!-- redirection button to the create article page -->
<div class="position-fixed" style="top: 1.55rem; left: 8rem; z-index: 1000">
    <a class="btn btn-outline-dark" href="?p=read.article.admin&id=<?= $_GET['id'] ?>">
        <?= SVG_BACK_CRUD ?>
    </a>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">

            <!-- images add form-->
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

<!-- loop that recovers the images related to the current article and add button delete for current images -->
<div class="d-flex justify-content-center">
    <?php foreach ($img as $item) { ?>
        <div class="d-flex flex-column m-3">
            <img class="img-thumbnail" src="img/original/<?= $item['name_img'] ?>" alt="">
            <a id="delete-confirm" class="btn btn-outline-danger mx-auto  my-3 btn-lg font-weight-bold"
               href="?p=delete.img.admin&id=<?= $item['id_img'] ?>">
                DELETE
            </a>
        </div>
    <?php } ?>
</div>

<!-- call of the the js script for display the file name in the input file -->
<script src="js/name.file.js"></script>