let articleAll = document.querySelectorAll('#article');

for (let i = 0; i < articleAll.length; i++) {

    let promo = articleAll[i].querySelector('#promo').textContent.match(/\d+\.?\d*/g);
    let prix = articleAll[i].querySelector('#prix').textContent.match(/\d+\.?\d*/g);

    let div = document.createElement('p');
    let calc = prix - ((prix / 100) * promo);
    calc = parseFloat(calc).toFixed(2)

    div.append(calc);
    articleAll[i].append(div);

}