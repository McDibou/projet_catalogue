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
<body style="background-color: #f8f8f8;">

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
                <a class="btn btn-secondary dropdown-toggle" id="dropdownAdmin" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    ADMIN
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownAdmin">
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=create.article.admin">create.article</a>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=create.category.admin">create.category</a>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=create.shop.admin">create.shop</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=disconnect.admin">disconnect</a>
                </div>
            </div>
        </div>

    <?php } else { ?>

        <div class="admin-menu">
            <a class="text-white" href="?p=connect.public">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-lock" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M11.5 8h-7a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1zm-7-1a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-7zm0-3a3.5 3.5 0 1 1 7 0v3h-1V4a2.5 2.5 0 0 0-5 0v3h-1V4z"/>
                </svg>
            </a>
        </div>

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
<script src="js/carousel.js"></script>
<script src="js/app.js"></script>

</body>
</html>