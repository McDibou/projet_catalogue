<header>
    <div class="public-menu">
        <a href="./">ACCUEIL</a>
        <a href="?p=aboutus.public">ABOUT US</a>
        <div class="catalog-menu">
            <a href="?p=catalog.public">CATALOG</a>
            <div class="dropdown-catalog">
                <?php foreach ($category_home as $item) { ?>
                    <a href="?p=catalog.public&&category=<?= $item['name_category'] ?>"><?= $item['name_category'] ?></a>
                <?php } ?>
            </div>
        </div>
        <a href="?p=contact.public">CONTACT</a>
    </div>

    <?php if (isset($_SESSION['id_session']) && $_SESSION['id_session'] === session_id()) { ?>

        <div class="position-fixed m-5" style="z-index: 1000">
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
               <span><?= SVG_LOCK ?></span>
            </a>
        </div>
    <?php } ?>
</header>