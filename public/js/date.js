fetch('src/date.public.controller.php')

    .then(response => response.json())

    .then((data) => {

        promoUpdateDate(data);
        calcPromo(data)
        setInterval(promoUpdateDate, 1000, data);

    });


function promoUpdateDate(data) {

    let articleAll = document.querySelectorAll('#article');

    for (let i = 0; i < articleAll.length; i++) {

        let date_up = new Date();
        let date_down = new Date(data[i][6]);
        let date = (date_down - date_up) / 1000;

        if (date >= 0) {

            if (articleAll[i].querySelector('.date') !== null) {
                articleAll[i].querySelector('.date').remove();
            }

            let div3 = document.createElement('p');
            div3.classList.add('date');

            let jours = Math.floor(date / (60 * 60 * 24));
            let heures = Math.floor((date - (jours * 60 * 60 * 24)) / (60 * 60));
            let minutes = Math.floor((date - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
            let secondes = Math.floor(date - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));


            let test = jours + 'j ' + heures + 'h' + minutes + ':' + secondes;

            div3.append(test);
            articleAll[i].append(div3);


        }
    }
}


function calcPromo(data) {

    let articleAll = document.querySelectorAll('#article');

    for (let i = 0; i < articleAll.length; i++) {
        
        let promo = articleAll[i].querySelector('#promo').textContent.match(/\d+\.?\d*/g);
        let prix = articleAll[i].querySelector('#prix').textContent.match(/\d+\.?\d*/g);

        let date_up = new Date();
        let date_down = new Date(data[i][6]);
        let date = (date_down - date_up) / 1000;

        if (date >= 0) {

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
}