<header>
    <nav class="public-menu">
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