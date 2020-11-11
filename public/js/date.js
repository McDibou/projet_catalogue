// file used to display the countdown and the calculation of promotional articles

// retrieves a php file that contains JSON asynchronously
fetch('src/date.public.controller.php')

    // fetch the fetch answer as json
    .then(response => response.json())

    // assigns the json object to the functions defined below
    .then((data) => {

        promoUpdateDate(data);
        calcPromo(data)
        setInterval(promoUpdateDate, 1000, data);

    })

    // if the answer is an error
    .catch(function(error) {
        console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
    });

// retrieve all the ids of the current items
let idArticle = document.querySelectorAll('#id-article');

// retrieve all the current item block
let articleAll = document.querySelectorAll('#article');


/**
 * function that is used to create a countdown timer
 * @param {object} data
 */
function promoUpdateDate(data) {

    // initializes a table where only those articles that need to be counted will be stored.
    let tab = [];

    // browse the object that contains all the articles and check if on the current page there are any occurrences with the id
    for (let i = 0; i < data.length; i++) {
        for (let j = 0; j < idArticle.length; j++) {

            // if true, add the articles to the table
            if (data[i][0] === idArticle[j].value) {
                tab.push(data[i])
            }
        }
    }

    // runs through the essence of the table constructed above
    for (let i = 0; i < tab.length; i++) {

        // create a new date object and attribute it to a variable
        let date_up = new Date();

        // create a new date object in relation to the date of the current item and attribute it to a variable
        let date_down = new Date(tab[i][6]);

        // calculates the remaining time in seconds
        let date = (date_down - date_up) / 1000;

        // if the remaining time is greater than zero
        if (date >= 0) {

            // old selection div with the countdown and delete it and will be recreated below
            if (articleAll[i].querySelector('.date') !== null) {
                articleAll[i].querySelector('.date').remove();
            }

            // create a div and add a class to it
            let div3 = document.createElement('p');
            div3.classList.add('date');

            // definie les variables day, time, minute, second en fonction du temps restant
            let day = Math.floor(date / (60 * 60 * 24));
            let time = Math.floor((date - (day * 60 * 60 * 24)) / (60 * 60));
            let minute = Math.floor((date - ((day * 60 * 60 * 24 + time * 60 * 60))) / 60);
            let second = Math.floor(date - ((day * 60 * 60 * 24 + time * 60 * 60 + minute * 60)));

            // check if there is at least one day ago, if not, don't display anything
            day = ( day !== 0) ?  day + 'J ' : '';

            // check if the length of the number is 1, if true, add a 0 in front of it
            time = ( time.toString().length === 1) ? '0' + time : time
            minute = ( minute.toString().length === 1) ? '0' + minute : minute
            second = ( second.toString().length === 1) ? '0' + second : second

            // builds the countdown
            let dateFinal = day + time + 'h' + minute + ':' + second;

            // attribute this countdown to the div built above
            div3.append(dateFinal);

            // and attributes it to the current item
            articleAll[i].append(div3);

        }
    }
}

/**
 * function that calculates the promotion of the current item and redefines a display
 * @param {object} data
 */
function calcPromo(data) {

    // initializes a table where only those articles that need to be counted will be stored.
    let tab = [];

    // browse the object that contains all the articles and check if on the current page there are any occurrences with the id
    for (let i = 0; i < data.length; i++) {
        for (let j = 0; j < idArticle.length; j++) {

            // if true, add the articles to the table
            if (data[i][0] === idArticle[j].value) {
                tab.push(data[i])
            }
        }
    }

    // runs through the essence of the table constructed above
    for (let i = 0; i < tab.length; i++) {

        // create a new date object and attribute it to a variable
        let date_up = new Date();

        // create a new date object in relation to the date of the current item and attribute it to a variable
        let date_down = new Date(tab[i][6]);

        // calculates the remaining time in seconds
        let date = (date_down - date_up) / 1000;

        // if the remaining time is greater than zero
        if (date >= 0) {

            // select the div containing the promotion and price and sort it to retrieve only the numbers that you want.
            let promo = articleAll[i].querySelector('#promo').textContent.match(/\d+\.?\d*/g);
            let prix = articleAll[i].querySelector('#prix').textContent.match(/\d+\.?\d*/g);

            // delete the div containing the price not recalculate
            articleAll[i].querySelector('#prix').remove()

            // create a div and add a class to it
            let div = document.createElement('p');
            let div2 = document.createElement('p');
            div.classList.add('new-price')
            div2.classList.add('surligne')

            // calculates the promotion and defines its format
            let calc = (prix - ((prix / 100) * promo));
            calc = parseFloat(calc).toFixed(2)

            let result = calc + '€';
            let result2 = prix + '€';

            // attribute this countdown to the div built above
            div.append(result);
            div2.append(result2);

            // and attributes it to the current item
            articleAll[i].append(div);
            articleAll[i].append(div2);

            // else removes the promotion division to avoid artifacts.
        } else {

            articleAll[i].querySelector('#promo').remove();

        }
    }
}