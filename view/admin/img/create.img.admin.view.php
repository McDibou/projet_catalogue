
<form method="post" enctype="multipart/form-data">
    <input name="name_img" id="name_img" type="file" accept="image/*" required>
    <button type="submit" name="create_img">create</button>
</form>
<hr>


<?php foreach ($img as $item) { ?>

    <div><?= $item['name_img'] ?></div>

    <div>
        <a href="?p=delete.img.admin&id=<?= $item['id_img'] ?>">delete</a>
    </div>

<?php } ?>

<?= !empty($error_create_img) ? $error_create_img : '' ?>
