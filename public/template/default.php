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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Catalog</title>
</head>
<body>

<header>
    <nav class="public-menu">
        <a href="./">ACCUEIL</a>
        <a href="?p=aboutus.public">ABOUT US</a>
        <a href="?p=catalog.public">CATALOG</a>
        <a href="?p=contact.public">CONTACT</a>
    </nav>

    <?php if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) { ?>

        <div class="position-fixed m-5">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    ADMIN
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdown">
                    <a class="dropdown-item" href="?p=create.article.admin">create.article</a>
                    <a class="dropdown-item" href="?p=create.category.admin">create.category</a>
                    <a class="dropdown-item" href="?p=create.shop.admin">create.shop</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?p=disconnect.admin">disconnect</a>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <nav class="admin-menu">
            <a href="?p=connect.public">CONNECT</a>
        </nav>

    <?php } ?>
</header>

<?= $content ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
<script src="js/map.js"></script>
<script src="js/date.js"></script>
<script src="js/app.js"></script>

</body>
</html>