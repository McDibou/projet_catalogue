<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
          integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
          crossorigin=""/>
    <title>Catalog</title>
</head>
<body>

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

            <li><a href="?p=create.article.admin">create.article.admin</a></li>
            <li><a href="?p=disconnect.admin">disconnect.admin</a></li>

        <?php } else { ?>

            <li><a href="?p=connect.public">connect.public</a></li>

        <?php } ?>
    </ul>

    <ul><li><a href="#" onclick="history.go(-1);">Back </a></li></ul>

</header>
<?= $content ?>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="js/map.js"></script>
</body>
</html>