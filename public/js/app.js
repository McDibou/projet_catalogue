let lowerSlider = document.querySelector('#lower');
let upperSlider = document.querySelector('#upper');

function updateMin(e, offset = 50) {
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);
    let upperMax = parseInt(upperSlider.max);

    if (lowerVal < upperMax - offset) {
        document.querySelector('#min').textContent = lowerVal;
        if (upperVal < lowerVal + offset) {
            document.querySelector('#max').textContent = lowerVal + offset;
            upperSlider.value = lowerVal + offset;
        }
    } else {
        lowerSlider.value = upperMax - offset;
    }
}

function updateMax(e, offset = 50) {
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);
    let lowerMin = parseInt(lowerSlider.min);

    if (upperVal > lowerMin + offset) {
        document.querySelector('#max').textContent = upperVal;
        if (upperVal < lowerVal + offset) {
            document.querySelector('#min').textContent = upperVal - offset;
            lowerSlider.value = upperVal - offset;
        }
    } else {
        upperSlider.value = lowerMin + offset;
    }
}

lowerSlider.addEventListener('input', updateMin);
upperSlider.addEventListener('input', updateMax);