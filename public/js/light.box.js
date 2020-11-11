// file to browse the lightbox images either by the arrows or by clicking on the thumbnails

// defines the starting position of the slider
let idSlideBox = 0;

// select all the items containing the class slidebox
let slideBox = document.querySelectorAll('.slidebox');

// set the first image to be displayed
slideBox[0].style.display = 'block';

// defines the direction of depart
let directionBox = "right";

/**
 * function to set the current item to `display:block` and all the others to `display:none`
 * @param {int} value
 */
function sliderBox(value) {

    // adds the parameter to the starting position
    idSlideBox += value;
    // defines the new direction according to the parameter
    directionBox = value === 1 ? "right" : "left";

    // if the start position is greater than or equal to the item numbers. reset the start position to zero, to create a loop.
    if (idSlideBox >= slideBox.length) {
        idSlideBox = 0;
    }

    // if the start position is smaller than the number of items. remete the start position to the last item of the table, to create a loop.
    if (idSlideBox < 0) {
        idSlideBox = slideBox.length - 1;
    }

    // scrolls through all the items in the table and makes them disappear
    for (let i = 0; i < slideBox.length; i++) {
        slideBox[i].style.display = 'none';
    }

    // selects the current item and makes it appear
    slideBox[idSlideBox].style.display = 'block';
}

/**
 * function that is only used when clicking on a thumbnail displays the corresponding image
 * @param {int} value
 */
function currentSlide(value) {

    // scrolls through all the items in the table and makes them disappear
    for (let i = 0; i < slideBox.length; i++) {
        slideBox[i].style.display = 'none';
    }

    // selects the current item and displays it.
    slideBox[value].style.display = 'block';
}
