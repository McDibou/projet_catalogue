<div class="body-accueil">
    <img src="img/src/accueil.jpg" alt="">
</div>

<div>
    <div class="title-accueil">
        <img class="img2" src="img/src/logo.black.png" alt="">
        <img src="img/src/logo.white.png" alt="">
    </div>

    <p class="intro-accueil">
        " Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Animi, at consequuntur dolor esse expedita impedit
        laborum minus necessitatibus nesciunt nostrum quia quos reiciendis sapiente.
        Alias consequuntur delectus dolore laudantium modi! "
    </p>
</div>

<div class="card-accueil">
    <?php foreach ($promo as $item) { ?>
        <div id="article" class="card slide">
            <div class="title">
                <h3>GUIT.DEV/</h3>
                <h5><?= $item['title_article'] ?></h5>
            </div>
            <div class="category">
                <?php $category = readCategory($item['id_article'], $db) ?>
                <?php foreach ($category as $cat) { ?>
                    <div><?= $cat['name_category'] ?></div>
                <?php } ?>
            </div>
            <div class="desc">
                <pre><?= $item['content_article'] ?></pre>
            </div>
            <div>
                <p id="prix"><?= $item['price_article'] ?>€</p>
                <p id="promo"><?= ($item['promo_article'] !== '0') ? 'SAVE ' . $item['promo_article'] . '%' : ''; ?></p>
            </div>
            <a class="link-pay" href="">ADD TO CARD</a>

            <div class="img">
                <?php $img = readOneImg($item['id_article'], $db); ?>
                <img class="img2" src="img/<?= $img['name_img'] ?>">
                <img class="img1" src="img/<?= $img['name_img'] ?>">
            </div>
            <form method="post">
                <input id="id-article" name="id_article" value="<?= $item['id_article'] ?>" type="hidden">
                <button name="lightbox" type="submit" class="link-show">
                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-arrow-right-square-fill"
                         fill="currentColor"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 8.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                    </svg>
                </button>
            </form>
        </div>
    <?php } ?>
    <a class="prev" onclick="sliderMove(-1)">
        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-caret-down-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
        </svg>
    </a>
    <a class="next" onclick="sliderMove(1)">
        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-caret-up-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path d="M7.247 4.86l-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
        </svg>
    </a>
</div>

<div class="show-art">
    <div class="title">
        <h3>GUIT.DEV/</h3>
        <h5><?= $show['title_article'] ?></h5>
    </div>
    <div class="category">
        <?php $category = readCategory($show['id_article'], $db) ?>
        <?php foreach ($category as $cat) { ?>
            <div><?= $cat['name_category'] ?></div>
        <?php } ?>
    </div>

    <div class="link">
        <div>CURRENT ARTICLE</div>
        <form method="post">
            <input name="id_article" value="<?= $show['id_article'] ?>" type="hidden">
            <button name="lightbox" type="submit" class="link-show">
                <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-arrow-right-square-fill"
                     fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm2.5 8.5a.5.5 0 0 1 0-1h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5z"/>
                </svg>
            </button>
        </form>
    </div>
</div>