<?php
if (isset($_SESSION['id_session'])) {
    header('Location: ?p=create.article.admin');
}
?>

<div class="py-5"></div>
<div class="py-5"></div>
<div class="py-5">
    <p class="text-center mx-auto font-weight-bold text-danger"><?= !empty($error_input) ? $error_input : '' ?></p>
</div>

<div class="container ">
    <div class="row justify-content-center">

        <div class="col-6">
            <form method="post">
                <div class="form-group">
                    <label class="m-2" for="mail">Name</label>
                    <input class="form-control" id="mail" value="<?= !empty($name_user) ? $name_user : '' ?>"
                           type="text"
                           name="name_user" required>
                </div>
                <div class="form-group">
                    <label class="m-2" for="password">Password</label>
                    <input class="form-control" id="password"
                           value="<?= !empty($password_user) ? $password_user : '' ?>"
                           type="password" name="password_user"
                           required>
                </div>

                <button class="btn btn-light btn-block col-6 m-auto" type="submit" name="connect_user">CONNECT</button>

            </form>

        </div>
    </div>
</div>
