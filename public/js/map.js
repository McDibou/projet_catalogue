
// retrieve the location go to the url
let position = (location.href.split('?').length > 1) ? location.href.split('?')[1].split('=') : '';

// assigns the new map leaflet object to a variable
let mymap = L.map('mapid');


// assigns the new marker leaflet object to a variable and defines it's property.
let myloc = L.icon({
    iconUrl: 'img/src/icon.loc.svg',
    iconSize: [30, 40],
    iconAnchor: [15, 35],
    popupAnchor: [0, -40],
    autoPanPadding: true
})

// assigns the new marker leaflet object to a variable and defines it's property.
let myicon = L.icon({
    iconUrl: 'img/src/icon.here.svg',
    iconSize: [30, 40],
    iconAnchor: [15, 35],
    popupAnchor: [0, -40],
    className: 'icon-map',
})

// create a new leaflet object that retrieves the tiles from the map and sets the parameters. and add to the map.
L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    minZoom: 12,
    maxZoom: 18
}).addTo(mymap);

/**
 * function that constructs an html block according to its coordination pass in parameter
 * @param {string} position
 * @returns {string} html block containing the info of a shop
 */
function readShop(position) {

    // select all shops
    let shop = document.querySelectorAll('#shop')

    // browse all the shops and if there is a match, select the values of the current element and create an html block.
    for (let i = 0; i < shop.length; i++) {
        if (position === shop[i].querySelector('#loc').value) {
            return `
                    <img id="img" src="./img/src/logo.black.mini.png" alt="">
                    <h4 id="name">${shop[i].querySelector('#name').innerHTML}</h4>
                    <p id="desc">${shop[i].querySelector('#desc').innerHTML}</p>
                    <em id="ville">${shop[i].querySelector('#ville').innerHTML}</em>
                    `
        }
    }
}

// condition that checks if we are on the contact page
if (position[2] != null && position[1].split('&')[0] === 'contact.public') {

    // then retrieve the position in the url
    loc = position[2].split(',');

    // moves the map to the pass coordinate
    mymap.setView([loc[0], loc[1]], 12);

    // displays a popup with the information retrieved by the function `readShop()`.
    L.marker([loc[0], loc[1]], {icon: myicon}).addTo(mymap).bindPopup(readShop(position[2])).openPopup();

    // check if we are on the admin page create shop
} else if ((position[2] != null && position[1].split('&')[0] === 'create.shop.admin')) {

    // then retrieve the position in the url
    loc = position[2].split(',');

    // moves the map to the pass coordinate
    mymap.setView([loc[0], loc[1]], 12);

    // else nothing is passed in the url and start position on two pages is set by default
} else {

    mymap.setView([50.84827657517526, 4.352726141533356], 12);

}

// retrieves a php file that contains JSON asynchronously
fetch('src/map.public.controller.php')

    // fetch the fetch answer as json
    .then(response => response.json())

    // processes the json object to create the markers on the map
    .then((data) => {

        // browse the object
        for (let i = 0; i < data.length; i++) {

            // retrieve the location
            let lat = data[i][2].split(',');

            // create a new marker leaftlet object for each shop, in an html block and give it an event.
            L.marker([lat[0], lat[1]], {icon: myicon}).addTo(mymap).bindPopup(`
                            <img  id="img"  src="./img/src/logo.black.mini.png" alt="">
                            <h4 id="name">${data[i][1]}</h4>
                            <p id="desc">${data[i][4]}</p>
                            <em id="ville">${data[i][3]}</em>
                    `).on('click', onClick);


        }
    })

    // if the answer is an error
    .catch(function (error) {
        console.log('Il y a eu un problème avec l\'opération fetch: ' + error.message);
    });

// selects the button here and assigns it an event defined in a function
document.querySelector('#here').addEventListener("click", localisationHere);

/**
 * function that geolocates the user and displays him on the map
 */
function localisationHere() {

    // method that retrieves the location of the user and returns a callback function that takes a Position object as argument.
    navigator.geolocation.getCurrentPosition(function (position) {

        // create a marker with the user's position
        L.marker([position.coords.latitude, position.coords.longitude], {icon: myloc}).addTo(mymap);
        mymap.panTo([position.coords.latitude, position.coords.longitude], 12);

    });
}

/**
 * function that centers the marker that is clicked on in the center of the map
 */
function onClick() {
    mymap.panTo(this.getLatLng())
}