<?php

function cardModel($item)
{
    $card = '';
    $card .= '<div class="title">';
    $card .= '<h3>GUIT.DEV/</h3>';
    $card .= '<h5>' . $item['title_article'] . '</h5>';
    $card .= '</div>';
    $card .= '<div class="category">';

    $category = explode('|_|', $item['group_name_category']);
    foreach ($category as $cat) {
        $card .= ' <div>' . $cat . '</div>';
    }

    $card .= '</div>';
    $card .= '<div class="desc">';
    $card .= '<pre>' . $item['content_article'] . '</pre>';
    $card .= '</div>';
    $card .= '<div>';
    $card .= '<p id="prix">' . $item['price_article'] . '€</p>';

    if ($item['promo_article'] !== '0') {
        $card .= '<p id="promo">SAVE ' . $item['promo_article'] . '% </p>';
    } else {
        $card .= '<p id="promo"></p>';
    }

    $card .= '</div>';
    $card .= '<a class="link-pay">ADD TO CARD</a>';
    $card .= '<div class="img">';
    $img = explode('|_|', $item['group_name_img']);
    $card .= '<img class="img2" src="img/original/' . $img[0] . '">';
    $card .= '<img class="img1" src="img/original/' . $img[0] . '">';
    $card .= '</div>';
    $card .= '<form method="post">';
    $card .= '<input id="id-article" name="id_article" value="' . $item['id_article'] . '" type="hidden">';
    $card .= '<button name="lightbox" type="submit" class="link-show">';
    $card .= '<span>' . SVG_SHOW_LINK . '</span>';
    $card .= '</button>';
    $card .= '</form>';
    return $card;
}