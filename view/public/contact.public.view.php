<form method="post">

    <input value="<?= (!empty($name_mail)) ? $name_mail : null; ?>" name="name_mail" type="text" maxlength="30"
           pattern="[A-Za-z0-9 '-]+$" required>

    <input value="<?= (!empty($subject_mail)) ? $subject_mail : null; ?>" name="subject_mail" type="text" maxlength="30"
           pattern="[A-Za-z0-9 '-]+$" required>

    <input value="<?= (!empty($url_mail)) ? $url_mail : null; ?>" name="url_mail" type="email" maxlength="30"
           pattern="[A-Za-z0-9.-_]+@[A-za-z0-9]+\.[a-z0-9]{2,}" required>

    <textarea name="content_mail" cols="20" rows="5" maxlength="255"
              required><?= (!empty($content_mail)) ? $content_mail : null; ?></textarea>

    <button name="contact_mail" type="submit">ENVOYER</button>

</form>

<?= !empty($succes) ? $succes : '' ?>
<?= !empty($error) ? $error : '' ?>