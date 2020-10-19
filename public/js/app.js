let articleAll = document.querySelectorAll('#article');

for (let i = 0; i < articleAll.length; i++) {

    let promo = articleAll[i].querySelector('#promo').textContent.match(/\d+\.?\d*/g);
    let prix = articleAll[i].querySelector('#prix').textContent.match(/\d+\.?\d*/g);

    let div = document.createElement('p');
    div.classList.add('new-price')
    let calc = (prix - ((prix / 100) * promo));
    calc = parseFloat(calc).toFixed(2)
    let result = '' + calc + ' €';

    articleAll[i].querySelector('#prix').remove()

    let div2 = document.createElement('p');
    div2.classList.add('surligne')
    let result2 = prix + ' €';
    div2.append(result2);
    articleAll[i].append(div2);

    div.append(result);
    articleAll[i].append(div);

}