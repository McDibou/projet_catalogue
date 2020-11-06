//script qui sert à annuler les animations si on fait d'autre action sur la meme page

// récupère la valeur du premier guetteur dans url
let compareUrl = location.href.split('?')[1].split('&')[0].split('=');
// selectionne la div du menu principal public
let menuPublic = document.querySelector('.public-menu')

// crée un tableau constant pour comparer les valeurs du premier autoriser dans url
const urlMenuOff = [
    'create.article.admin',
    'category.article.admin',
    'create.promo.admin',
    'create.img.admin',
    'read.article.admin',
    'modify.article.admin',
    'create.category.admin',
    'modify.category.admin',
    'create.shop.admin',
    'modify.shop.admin',
]

// si une la valeur récupéré dans url conrespond à une dans la tableau : `urlMenuOff`
if (urlMenuOff.includes(compareUrl[1])) {
    // efface la div
    menuPublic.style.display = 'none'
}

// split l'url et crée un tableau des guetteurs
let countUrl = location.href.split('?')[1].split('&');


// condition qui annule l'animation du menu sur certaines pages
// split les guetteurs, compare si on est sur un page specifice : `page catalog` et `page contact` et si il y a en plusieur guetteurs
if ((countUrl[0].split('=')[1] === 'catalog.public' || countUrl[0].split('=')[1] === 'contact.public') && countUrl.length > 1) {

    // prend les differentes div comportant les animation à annuler
    let menu1 = document.querySelector('.public-menu > a:nth-child(1)');
    let menu2 = document.querySelector('.public-menu > a:nth-child(2)');
    let menu3 = document.querySelector('.public-menu > .catalog-menu');
    let menu4 = document.querySelector('.public-menu > a:nth-child(4)');

    // annule les animations sur les différentes div
    menu1.style.animation = 'none';
    menu2.style.animation = 'none';
    menu3.style.animation = 'none';
    menu4.style.animation = 'none';

}

// condition qui annule l'animation des div sur la page catalog
// split les guetteurs, compare si on est sur un page specifice : `page catalog`
if (countUrl[0].split('=')[1] === 'catalog.public') {

    // prend les differentes div comportant les animation à annuler
    let img = document.querySelector('.img-catalog img');
    let button = document.querySelector('.search button');
    let a = document.querySelector('.search a');
    let switchNumber = document.querySelector('.switch-number');
    let select = document.querySelector('.search select');
    let lower = document.querySelector('#lower');
    let upper = document.querySelector('#upper');
    let min = document.querySelector('#min');
    let max = document.querySelector('#max');
    let left = document.querySelector('#left');
    let right = document.querySelector('#right');

    // si il y a en plusieur guetteurs
    if (countUrl[0].split('=')[1] === 'catalog.public' && countUrl.length > 1) {

        // annule les animations sur les différentes div
        img.style.animation = 'none';
        button.style.animation = 'none';
        a.style.animation = 'none';
        select.style.animation = 'none';
        lower.style.animation = 'none';
        upper.style.animation = 'none';
        min.style.animation = 'none';
        max.style.animation = 'none';
        left.style.animation = 'none';
        right.style.animation = 'none';

        switchNumber.style.animation = 'none';

    }
}

// condition qui annule l'animation des div sur la page contact
// split les guetteurs, compare si on est sur un page specifice : `page contact`
if (countUrl[0].split('=')[1] === 'contact.public') {

    // prend les differentes div comportant les animation à annuler
    let social = document.querySelectorAll('.social-network div')
    let label = document.querySelectorAll('.form-contact label')
    let input = document.querySelectorAll('.form-contact input')

    let position = document.querySelector('.position')
    let map = document.querySelector('.contact #mapid')
    let button = document.querySelector('.form-contact button')
    let textarea = document.querySelector('.form-contact textarea')

    // si il y a en plusieur guetteurs
    if (countUrl[0].split('=')[1] === 'contact.public' && countUrl.length > 1) {

        // annule les animations sur les différentes div
        for (let i = 0; i < social.length; i++) {
            social[i].style.animation = 'none';
        }

        for (let i = 0; i < label.length; i++) {
            label[i].style.animation = 'none';
        }

        for (let i = 0; i < input.length; i++) {
            input[i].style.animation = 'none';
        }

        position.style.animation = 'none';
        map.style.animation = 'none';
        button.style.animation = 'none';

        textarea.style.animation = 'none'

    }
}