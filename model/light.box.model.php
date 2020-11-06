<?php

function lightBoxModel($item, $count)
{
    $lightBox = '';
    $lightBox .= '<div class="light"><img src="img/src/accueil.jpg" alt=""></div>';
    $lightBox .= '<div class="light-box">';
    $lightBox .= '<div class="box">';

    foreach ($item as $img) :
        $lightBox .= '<div class="slidebox" style="display: none;">';
        $lightBox .= '<img src="img/original/' . $img['name_img'] . '">';
        $lightBox .= '</div>';
    endforeach;

    if ($count > 1) {
        $lightBox .= '<a class="prev" onclick="sliderBox(-1)">';
        $lightBox .= '<span>' . CARET_RIGHT . '</span>';
        $lightBox .= '</a>';
        $lightBox .= '<a class="next" onclick="sliderBox(1)">';
        $lightBox .= '<span>' . CARET_LEFT . '</span>';
        $lightBox .= '</a>';

        $lightBox .= '<div class="view-slide">';
        foreach ($item as $key => $img) :
            $lightBox .= '<img onclick="currentSlide(' . $key . ')" src="img/original/' . $img['name_img'] . '">';
        endforeach;
        $lightBox .= '</div>';
    }

    $lightBox .= '<a class="back-box" href="" onclick="history.go(-1)">';
    $lightBox .= '<span>' . SVG_CLOSE . '</span>';
    $lightBox .= '</a>';

    $lightBox .= '</div>';
    $lightBox .= '</div>';

    return $lightBox;
}