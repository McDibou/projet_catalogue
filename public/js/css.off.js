// file that browses the url and according to where it is located and overwrites animation or css style

// cut the url in more than one part to get the first lookout
let compareUrl = location.href.split('?')
if (typeof compareUrl[1] !== "undefined") {
    compareUrl = compareUrl[1].split('&')[0].split('=');
}


// defines a constant table that will be used for comparison with the divide url
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

//  selects the public menu
let menuPublic = document.querySelector('.public-menu')

// compares with the constant table and the cut url to erase the public menu on some pages
if (urlMenuOff.includes(compareUrl[1])) {
    menuPublic.style.display = 'none'
}

// cut the url in more than one part to get the first lookout
let countUrl = location.href.split('?');
if (typeof countUrl[1] !== "undefined") {
    countUrl = countUrl[1].split('&');
}

// compares the cut url with the current element and if there is more than one `get` in the url
if (countUrl[0].split('=')[1] === 'catalog.public' && countUrl.length > 1) {

    // selects all the divs on the page
    let catalog = document.querySelectorAll('*')

    // runs through all the div
    for (let i of catalog) {
        // if an animation is different from the given parameters, we remove its animation.
        if (window.getComputedStyle(i).animationName !== 'none' && window.getComputedStyle(i).animationName !== 'flipCardCatalog') {
            i.style.animation = 'none'
        }
    }
}


// compares the cut url with the current element and if there is more than one `get` in the url
if (countUrl[0].split('=')[1] === 'contact.public' && countUrl.length > 1) {

    // selects all the divs on the page
    let contact = document.querySelectorAll('*')

    // if an animation is different from the given parameters, we remove its animation.
    for (let i of contact) {
        if (window.getComputedStyle(i).animationName !== 'none') {
            i.style.animation = 'none'
        }
    }
}