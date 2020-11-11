// files the carousel of the home page with automatic scrolling

// defines the starting position of the slider
let idSlideMove = 0;

// select all the items containing the class slide
let slide = document.querySelectorAll('.slide');

// defines the direction of depart
let direction = "right";

/**
 * function to set the current item to `display:block` and all the others to `display:none`.
 * @param {int} value
 */
function sliderMove(value) {

    // adds the parameter to the starting position
    idSlideMove += value;
    // defines the new direction according to the parameter
    direction = value === 1 ? "right" : "left";

    // if the start position is greater than or equal to the item numbers. reset the start position to zero, to create a loop.
    if (idSlideMove >= slide.length) {
        idSlideMove = 0;
    }

    // if the start position is smaller than the number of items. remete the start position to the last item of the table, to create a loop.
    if (idSlideMove < 0) {
        idSlideMove = slide.length - 1;
    }

    // scrolls through all the items in the table and makes them disappear
    for (let i = 0; i < slide.length; i++) {
        slide[i].style.display = 'none';
    }

    // selects the current item and displays it.
    slide[idSlideMove].style.display = 'block';
}

// calls the function defined below to start it a first time when the page is loaded
sliderFade();

/**
 *function to set the current item to `display:block` and all the others to `display:none` automatic every 10 second,
 */
function sliderFade() {

    // defines the new direction according to the start value
    let value = direction === "right" ? 1 : -1;

    // call the function that modifies the style of the items
    sliderMove(value)

    // sets a 10-second delay to recall the `sliderFade()` function.
    setTimeout(sliderFade, 10000);
}