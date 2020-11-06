let idSlideMove = -1;
let slide = document.querySelectorAll('.slide');
let direction = "right";

function sliderMove(value) {

    idSlideMove += value;
    direction = value === 1 ? "right" : "left";

    if (idSlideMove >= slide.length) {
        idSlideMove = 0;
    }

    if (idSlideMove < 0) {
        idSlideMove = slide.length - 1;
    }

    for (let i = 0; i < slide.length; i++) {
        slide[i].style.display = 'none';
    }

    slide[idSlideMove].style.display = 'block';
}

sliderFade();

function sliderFade() {

    let value = direction === "right" ? 1 : -1;
    idSlideMove += value;

    if (idSlideMove >= slide.length) {
        idSlideMove = 0;
    }

    if (idSlideMove < 0) {
        idSlideMove = slide.length - 1;
    }

    for (let i = 0; i < slide.length; i++) {
        slide[i].style.display = 'none';
    }

    slide[idSlideMove].style.display = 'block';

    setTimeout(sliderFade, 10000);
}