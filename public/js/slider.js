// file for the price slider in the research

// select the two sliders
let lowerSlider = document.querySelector('#lower');
let upperSlider = document.querySelector('#upper');

/**
 * function that regulates the behavior of the other slide in relation to it
 * @param e
 * @param {int} offset : value that limits the slider sliders in a range
 */
function updateMin(e, offset = 100) {

    // retrieves the values of the div
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);

    // select the maximum value of upper slider
    let upperMax = parseInt(upperSlider.max);

    // check if the lower slider is smaller than the maximum value of upper slider minus the range limit
    if (lowerVal < upperMax - offset) {

        // then assigns to the minimum div the value of lower slider
        document.querySelector('#min').textContent = lowerVal;

        // check if the value of upper slider is smaller than the value of lower slider with range limit
        if (upperVal < lowerVal + offset) {

            // then assigns to the maximum div the value of lower slider
            document.querySelector('#max').textContent = lowerVal + offset;

            // assigns the new location of the upper slider cursor in relation to the lower slider value
            upperSlider.value = lowerVal + offset;
        }
    } else {

        // else assigns the new location of the lower slider cursor in relation to the maximum value of upper slider
        lowerSlider.value = upperMax - offset;

    }
}

/**
 * function that regulates the behavior of the other slide in relation to it
 * @param e
 * @param {int} offset
 */
function updateMax(e, offset = 100) {

    // retrieves the values of the div
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);

    // select the minimum value of lower slider
    let lowerMin = parseInt(lowerSlider.min);

    // check if the upper slider is larger than the minimum value of lower slider with the reach limit
    if (upperVal > lowerMin + offset) {

        // then assigns to the maximum div the value of upper slider
        document.querySelector('#max').textContent = upperVal;

        // check if the value of the upper slider is lower than the value of the lower slider with range limit
        if (upperVal < lowerVal + offset) {

            // then assigns to the minimum div the value of upper slider
            document.querySelector('#min').textContent = upperVal - offset;

            // assigns the new location of the lower slider cursor to the value of the upper slider
            lowerSlider.value = upperVal - offset;
        }
    } else {

        // assigns the new location of the upper slider cursor to the minimum value of lower slider
        upperSlider.value = lowerMin + offset;
    }
}

// assigns an event if the value of the current input changes
lowerSlider.addEventListener('input', updateMin);
upperSlider.addEventListener('input', updateMax);