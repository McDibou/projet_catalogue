let compareUrl = location.href.split('?')
if (typeof compareUrl[1] !== "undefined") {
    compareUrl = compareUrl[1].split('&')[0].split('=');
}

let menuPublic = document.querySelector('.public-menu')

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

if (urlMenuOff.includes(compareUrl[1])) {
    menuPublic.style.display = 'none'
}

let countUrl = location.href.split('?');
if (typeof countUrl[1] !== "undefined") {
    countUrl = countUrl[1].split('&');
}

if (countUrl[0].split('=')[1] === 'catalog.public' && countUrl.length > 1) {

    let catalog = document.querySelectorAll('*')

    for (let i of catalog) {
        if (window.getComputedStyle(i).animationName !== 'none' && window.getComputedStyle(i).animationName !== 'flipCardCatalog') {
            i.style.animation = 'none'
        }
    }
}

if (countUrl[0].split('=')[1] === 'contact.public' && countUrl.length > 1) {

    let contact = document.querySelectorAll('*')

    for (let i of contact) {
        if (window.getComputedStyle(i).animationName !== 'none') {
            i.style.animation = 'none'
        }
    }
}