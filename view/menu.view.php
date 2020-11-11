<!-- page with the public and admin menu -->

<header>

    <!-- the public menu -->
    <div class="public-menu">
        <a href="./">ACCUEIL</a>
        <a href="?p=aboutus.public">ABOUT US</a>
        <div class="catalog-menu">
            <a href="?p=catalog.public">CATALOG</a>
            <!-- dropdown menu with a loop that recovers the categories from the database -->
            <div class="dropdown-catalog">
                <?php foreach ($category_home as $item) { ?>
                    <a href="?p=catalog.public&category=<?= $item['name_category'] ?>"><?= $item['name_category'] ?></a>
                <?php } ?>
            </div>
        </div>
        <a href="?p=contact.public">CONTACT</a>
    </div>

    <!-- condition that checks if the admin is logged in to display his menu -->
    <?php if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) { ?>

        <!-- the admin menu -->
        <div class="fixed-top m-4" style="z-index: 1000">
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
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="./">acceuil.public</a>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=aboutus.public">aboutus.public</a>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=catalog.public">catalog.public</a>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=contact.public">contact.public</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item py-2 px-5 text-uppercase font-weight-bold" href="?p=disconnect.admin">disconnect</a>
                </div>
            </div>
        </div>

        <!-- if the admin is not logged in, displays a button that redirects to the login page -->
    <?php } else { ?>

        <div class="admin-menu">
            <a class="text-white" href="?p=connect.public">
                <span><?= SVG_LOCK ?></span>
            </a>
        </div>

    <?php } ?>

    <!-- div use for dynamic display with the css of the bar below each menu button -->
    <div id="indicator"></div>

</header>