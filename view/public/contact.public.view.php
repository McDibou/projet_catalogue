<div class="contact">
    <div class="form-contact">
        <form method="post">
            <div>
                <label for="name_mail">NAME :</label>
                <input id="name_mail" value="<?= (!empty($name_mail)) ? $name_mail : null; ?>" name="name_mail"
                       type="text"
                       maxlength="30"
                       placeholder="max : 30"
                       pattern="[A-Za-z0-9 '-]+$" required>
            </div>
            <div>
                <label for="subject_mail">SUBJECT :</label>
                <input id="subject_mail" value="<?= (!empty($subject_mail)) ? $subject_mail : null; ?>"
                       name="subject_mail"
                       type="text"
                       maxlength="50"
                       placeholder="max : 50"
                       pattern="[A-Za-z0-9 '-]+$" required>
            </div>
            <div>
                <label for="url_mail">MAIL :</label>
                <input id="url_mail" value="<?= (!empty($url_mail)) ? $url_mail : null; ?>" name="url_mail"
                       type="email"
                       maxlength="80"
                       placeholder="max : 80"
                       pattern="[A-Za-z0-9.-_]+@[A-za-z0-9]+\.[a-z0-9]{2,}" required>
            </div>
            <div>
                <label for="content_mail">CONTENT :</label>
                <textarea id="content_mail" name="content_mail" cols="20" rows="5" maxlength="255"
                          placeholder="max : 255"
                          required><?= (!empty($content_mail)) ? $content_mail : null; ?></textarea>
            </div>
            <button name="contact_mail" type="submit">ENVOYER</button>
        </form>

        <?= !empty($succes) ? $succes : '' ?>
        <?= !empty($error) ? $error : '' ?>
    </div>

    <div id="mapid" class="map"></div>

    <button id="here">
        <?= SVG_MAP_HERE ?>
    </button>

    <div class="position">
        <?php foreach ($readShop as $item) { ?>
            <div id="shop">
                <a href="?p=contact.public&loc=<?= $item['localisation_shop'] ?>">
                    <img id="img" src="./img/src/logo.black.mini.png" alt="">
                    <input id="loc" value="<?= $item['localisation_shop'] ?>" type="hidden">
                    <h4 id="name"><?= $item['name_shop'] ?></h4>
                    <p id="desc"><?= $item['desc_shop'] ?></p>
                    <em id="ville"><?= $item['ville_shop'] ?></em>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

<div class="social-network">
    <div><a><span><?= SVG_GITHUB ?></span></a><p>GITHUB</p></div>
    <div><a><span><?= SVG_LINKEDIN ?></span></a><p>LINKEDIN</p></div>
    <div><a><span><?= SVG_GOOGLE ?></span></a><p>GOOGLE +</p></div>
    <div><a><span><?= SVG_SLACK ?></span></a><p>SLACK</p></div>
    <div><a><span><?= SVG_DISCORD ?></span></a><p>DISCORD</p></div>
</div>
