<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gabbler</title>
</head>
<body>
<!-- MODE PRODUCTION -->
<header>

    <ul>
        <li><a href="./">accueil.public</a></li>
        <li><a href="?p=aboutus.public">aboutus.public</a></li>
        <li><a href="?p=catalog.public">catalog.public</a></li>
        <li><a href="?p=contact.public">contact.public</a></li>


        <li><a href="?p=404">Page.404</a></li>
    </ul>
    <ul>
        <?php if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) { ?>

            <li><a href="?p=crud.admin">crud.admin</a></li>
            <li><a href="?p=disconnect.admin">disconnect.admin</a></li>

        <?php } else { ?>

            <li><a href="?p=connect.public">connect.public</a></li>

        <?php } ?>
    </ul>

</header>
<?= $content ?>
</body>
</html>