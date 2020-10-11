<?php
 if (isset($_SESSION['id_session'])) {
     header('Location: ?p=create.article.admin');
 }
?>

<form method="post">
    <input value="<?= !empty($name_user) ? $name_user : '' ?>" type="text" name="name_user" required>
    <input value="<?= !empty($password_user) ? $password_user : '' ?>" type="password" name="password_user" required>
    <button type="submit" name="connect_user">CONNECT</button>
</form>

<?= !empty($error_input) ? $error_input : '' ?>