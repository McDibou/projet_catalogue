fetch('src/date.public.controller.php')

    .then(response => response.json())

    .then((data) => {
        function test() {
            let dataDate = data;

            return function stockDate() {

                console.log(dataDate);
            }
        }


    });

function promoUpdateDate() {

    let articleAll = document.querySelectorAll('#article');

    for (let i = 0; i < articleAll.length; i++) {

        if (data[i][3] !== '0') {

            if (articleAll[i].querySelector('.date') !== null) {
                articleAll[i].querySelector('.date').remove();
            }

            let div3 = document.createElement('p');
            div3.classList.add('date');

            let date_actuelle = new Date();
            let date_evenement = new Date(data[i][6]);
            let date = (date_evenement - date_actuelle) / 1000;

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

promoUpdateDate();
// setInterval(promoUpdateDate, 1000);