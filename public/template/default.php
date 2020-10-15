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
    <link rel="stylesheet" href="css/style.css">
    <title>Catalog</title>
</head>
<body>

<header>

    <nav class="public-menu">
        <a href="./">ACCUEIL</a>
        <a href="?p=aboutus.public">ABOUT US</a>
        <a href="?p=catalog.public">CATALOG</a>
        <a href="?p=contact.public">CONTACT</a>
        <div id="indicator"></div>
    </nav>

    <nav class="admin-menu">
        <?php if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) { ?>

            <a href="?p=create.article.admin">ESPACE</a>
            <a href="?p=disconnect.admin">DISCONNECT</a>

        <?php } else { ?>

            <a href="?p=connect.public">CONNECT</a>

        <?php } ?>
    </nav>

</header>

<?= $content ?>

<script src="jQuery/jquery-3.5.1.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="js/map.js"></script>
<script src="js/app.js"></script>
</body>
</html>