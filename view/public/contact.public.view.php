<div class="contact">
    <div class="form-contact">
        <form method="post">
            <div>
                <label for="name_mail">NAME :</label>
                <input id="name_mail" value="<?= (!empty($name_mail)) ? $name_mail : null; ?>" name="name_mail"
                       type="text"
                       maxlength="30"
                       pattern="[A-Za-z0-9 '-]+$" required>
            </div>
            <div>
                <label for="subject_mail">SUBJECT :</label>
                <input id="subject_mail" value="<?= (!empty($subject_mail)) ? $subject_mail : null; ?>"
                       name="subject_mail"
                       type="text"
                       maxlength="30"
                       pattern="[A-Za-z0-9 '-]+$" required>
            </div>
            <div>
                <label for="url_mail">MAIL :</label>
                <input id="url_mail" value="<?= (!empty($url_mail)) ? $url_mail : null; ?>" name="url_mail" type="email"
                       maxlength="30"
                       pattern="[A-Za-z0-9.-_]+@[A-za-z0-9]+\.[a-z0-9]{2,}" required>
            </div>
            <div>
                <label for="content_mail">CONTENT :</label>
                <textarea id="content_mail" name="content_mail" cols="20" rows="5" maxlength="255"
                          required><?= (!empty($content_mail)) ? $content_mail : null; ?></textarea>
            </div>
            <button name="contact_mail" type="submit">ENVOYER</button>
        </form>

        <?= !empty($succes) ? $succes : '' ?>
        <?= !empty($error) ? $error : '' ?>

    </div>
    <div id="mapid"></div>
    <button id="here">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-geo-fill" fill="currentColor"
             xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999zm2.493 8.574a.5.5 0 0 1-.411.575c-.712.118-1.28.295-1.655.493a1.319 1.319 0 0 0-.37.265.301.301 0 0 0-.057.09V14l.002.008a.147.147 0 0 0 .016.033.617.617 0 0 0 .145.15c.165.13.435.27.813.395.751.25 1.82.414 3.024.414s2.273-.163 3.024-.414c.378-.126.648-.265.813-.395a.619.619 0 0 0 .146-.15.148.148 0 0 0 .015-.033L12 14v-.004a.301.301 0 0 0-.057-.09 1.318 1.318 0 0 0-.37-.264c-.376-.198-.943-.375-1.655-.493a.5.5 0 1 1 .164-.986c.77.127 1.452.328 1.957.594C12.5 13 13 13.4 13 14c0 .426-.26.752-.544.977-.29.228-.68.413-1.116.558-.878.293-2.059.465-3.34.465-1.281 0-2.462-.172-3.34-.465-.436-.145-.826-.33-1.116-.558C3.26 14.752 3 14.426 3 14c0-.599.5-1 .961-1.243.505-.266 1.187-.467 1.957-.594a.5.5 0 0 1 .575.411z"/>
        </svg>
    </button>
    <div class="position">
        <?php foreach ($readShop as $item) { ?>
            <div id="shop">
                <a href="?p=contact.public&loc=<?= $item['localisation_shop'] ?>">
                    <input id="loc" value="<?= $item['localisation_shop'] ?>" type="hidden">
                    <h4 id="name"><?= $item['name_shop'] ?></h4>
                    <p id="desc"><?= $item['desc_shop'] ?></p>
                    <em id="ville"><?= $item['ville_shop'] ?></em>
                </a>
            </div>
        <?php } ?>
    </div>
</div>