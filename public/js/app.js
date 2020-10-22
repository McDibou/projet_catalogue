let lowerSlider = document.querySelector('#lower');
let upperSlider = document.querySelector('#upper');

upperSlider.oninput = function () {
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);

    if (upperVal < lowerVal + 50) {
        lowerSlider.value = upperVal - 50;

        if (upperVal === lowerVal - 50) {
            lowerSlider.value = lowerVal - 50;
        }
    }
};

lowerSlider.oninput = function () {
    let lowerVal = parseInt(lowerSlider.value);
    let upperVal = parseInt(upperSlider.value);

    if (lowerVal > upperVal - 50) {
        upperSlider.value = lowerVal + 50;

        if (lowerVal === upperVal + 50) {
            upperSlider.value = upperVal + 50;
        }
    }
};