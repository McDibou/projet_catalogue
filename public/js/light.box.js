let idSlideBox = 0;
let slideBox = document.querySelectorAll('.slidebox');
slideBox[0].style.display = 'block';
let directionBox = "right";


function sliderBox(value) {

    idSlideBox += value;
    directionBox = value === 1 ? "right" : "left";

    if (idSlideBox >= slideBox.length) {
        idSlideBox = 0;
    }

    if (idSlideBox < 0) {
        idSlideBox = slideBox.length - 1;
    }

    for (let i = 0; i < slideBox.length; i++) {
        slideBox[i].style.display = 'none';
    }

    slideBox[idSlideBox].style.display = 'block';
}


function currentSlide(value) {
    for (let i = 0; i < slideBox.length; i++) {
        slideBox[i].style.display = 'none';
    }

    slideBox[value].style.display = 'block';
}
