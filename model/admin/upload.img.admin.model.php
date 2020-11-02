<?php

function resizeThumb($new_name_img, $imgWidth, $imgHeight, $extend)
{

    if ($imgWidth > $imgHeight) {
        $proportion = 100 / $imgWidth;
    } else {
        $proportion = 50 / $imgHeight;
    }

    $endWidth = round($imgWidth * $proportion);
    $endHeight = round($imgHeight * $proportion);

    $background = imagecreatetruecolor($endWidth, $endHeight);
    $whiteBackground = imagecolorallocate($background, 255, 255, 255);
    imagefill($background, 0, 0, $whiteBackground);

    if ($extend == ".jpg" || $extend == ".jpeg") {

        $copy = imagecreatefromjpeg('img/original/' . $new_name_img);
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagejpeg($background, 'img/thumb/' . $new_name_img, 90);

    } elseif ($extend == ".png") {
        $copy = imagecreatefrompng('img/original/' . $new_name_img);
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);
        imagepng($background, 'img/thumb/' . $new_name_img);
    }

}

function uploadImg(array $name_file)
{
    if ($name_file['error'] == 0) {

        if (in_array(strtolower(strrchr($name_file['name'], ".")), [".jpg", ".jpeg", ".png"])) {

            if ($name_file['size'] < 10000000) {

                $imgSize = getimagesize($name_file['tmp_name']);
                $imgWidth = $imgSize[0];
                $imgHeight = $imgSize[1];

                if ($imgWidth < 800 && $imgHeight < 600) {
                    $new_name_img = date('U') . '_' . mt_rand(10000, 99999) . strtolower(strrchr($name_file['name'], "."));

                    if (move_uploaded_file($name_file['tmp_name'], 'img/original/' . $new_name_img)) {

                        resizeThumb($new_name_img, $imgWidth, $imgHeight, strtolower(strrchr($name_file['name'], ".")));

                        return [$new_name_img];
                    } else {
                        return 'echec upload';
                    }
                } else {
                    return 'echec echelle';
                }
            } else {
                return 'echec size';
            }
        } else {
            return 'echec type';
        }
    } else {
        return 'echec error';
    }
}
