let articleAll = document.querySelectorAll('#article');

for (let i = 0; i < articleAll.length; i++) {

    let promo = articleAll[i].querySelector('#promo').textContent.match(/\d+\.?\d*/g);
    let prix = articleAll[i].querySelector('#prix').textContent.match(/\d+\.?\d*/g);

    if (promo !== null) {

        articleAll[i].querySelector('#prix').remove()

        let div = document.createElement('p');
        let div2 = document.createElement('p');


        div.classList.add('new-price')
        div2.classList.add('surligne')

        let calc = (prix - ((prix / 100) * promo));
        calc = parseFloat(calc).toFixed(2)

        let result = calc + ' €';
        let result2 = prix + ' €';


        div.append(result);
        div2.append(result2);

        articleAll[i].append(div);
        articleAll[i].append(div2);


    } else {

        articleAll[i].querySelector('#promo').remove()

    }
}

