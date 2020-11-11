<?php

/**
 * resize images for thumbnails
 * @param string $new_name_img
 * @param number $imgWidth
 * @param number $imgHeight
 * @param string $extend
 */
function resizeThumb(string $new_name_img, $imgWidth, $imgHeight, string $extend)
{

    // define by which proportion the image is resized
    if ($imgWidth > $imgHeight) {
        $proportion = 100 / $imgWidth;
    } else {
        $proportion = 50 / $imgHeight;
    }

    // resize the height and width, and round them off
    $endWidth = round($imgWidth * $proportion);
    $endHeight = round($imgHeight * $proportion);

    // create a white background color at the new image size
    $background = imagecreatetruecolor($endWidth, $endHeight);
    $whiteBackground = imagecolorallocate($background, 255, 255, 255);
    imagefill($background, 0, 0, $whiteBackground);

    // check if the folder in which we are going to send the image exists, if not create it.
    if (!is_dir('img/thumb')) {
        mkdir('img/thumb', 0777, true);
    }

    // verifies the execution of the image
    if ($extend == ".jpg" || $extend == ".jpeg") {

        // copy the original image
        $copy = imagecreatefromjpeg('img/original/' . $new_name_img);

        // resize the image copy and apply the background color
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);

        // paste the new image in its folder
        imagejpeg($background, 'img/thumb/' . $new_name_img, 90);

    } elseif ($extend == ".png") {

        // copy the original image
        $copy = imagecreatefrompng('img/original/' . $new_name_img);

        // resize the image copy and apply the background color
        imagecopyresampled($background, $copy, 0, 0, 0, 0, $endWidth, $endHeight, $imgWidth, $imgHeight);

        // paste the new image in its folder
        imagepng($background, 'img/thumb/' . $new_name_img);
    }

}


/**
 * verifies if the recorded image corresponds to the standard defined by the admin and moves it to its folder
 * @param array $name_file
 * @return string|string[]
 */
function uploadImg(array $name_file)
{
    // if no error
    if ($name_file['error'] == 0) {

        //checks if the saved file exists in the defined table.
        if (in_array(strtolower(strrchr($name_file['name'], ".")), [".jpg", ".jpeg", ".png"])) {

            // if the image is not as heavy as 10 mo
            if ($name_file['size'] < 10000000) {

                // retrieve the size of the image sent
                $imgSize = getimagesize($name_file['tmp_name']);
                $imgWidth = $imgSize[0];
                $imgHeight = $imgSize[1];

                // check if the image is not too large
                if ($imgWidth < 800 && $imgHeight < 600) {

                    // writes a new name for the image
                    $new_name_img = date('U') . '_' . mt_rand(10000, 99999) . strtolower(strrchr($name_file['name'], "."));

                    // check if the folder in which we are going to send the image exists, if not create it.
                    if (!is_dir('img/original')) {
                        mkdir('img/original', 0777, true);
                    }

                    // send the image to its folder and if returns true, resize the image
                    if (move_uploaded_file($name_file['tmp_name'], 'img/original/' . $new_name_img)) {

                        // rezise images function
                        resizeThumb($new_name_img, $imgWidth, $imgHeight, strtolower(strrchr($name_file['name'], ".")));

                        // returns the name of the image if everything went well
                        return [$new_name_img];

                    } else {
                        return 'The image could not be copied';
                    }
                } else {
                    return 'The image is too big, max height : 600px and max width : 800px';
                }
            } else {
                return 'The weight of the image is too heavy, max: 10mo';
            }
        } else {
            return 'Image type is not allowed ( allowed: jpeg, jpg, png )';
        }
    } else {
        return 'An error has occurred';
    }
}
