let position = location.href.split('?')[1].split('=');
let mymap = L.map('mapid');


let myloc = L.icon({
    iconUrl: 'img/src/icon.loc.svg',
    iconSize: [30, 40],
    iconAnchor: [15, 35],
    popupAnchor: [0, -40]
})

let myicon = L.icon({
    iconUrl: 'img/src/icon.here.svg',
    iconSize: [30, 40],
    iconAnchor: [15, 35],
    popupAnchor: [0, -40]
})


function readShop(position) {

    let shop = document.querySelectorAll('#shop')

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

if (position[2] != null) {

    loc = position[2].split(',');
    mymap.setView([loc[0], loc[1]], 12);
    L.marker([loc[0], loc[1]], {icon: myicon}).addTo(mymap).bindPopup(readShop(position[2])).openPopup();

} else {

    mymap.setView([50.84827657517526, 4.352726141533356], 12);

}

L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    minZoom: 12,
    maxZoom: 18
}).addTo(mymap);


fetch('src/map.public.controller.php')

    .then(response => response.json())

    .then((data) => {

        for (let i = 0; i < data.length; i++) {

            let lat = data[i][2].split(',');
            L.marker([lat[0], lat[1]], {icon: myicon}).addTo(mymap).bindPopup(`
                            <img  id="img"  src="./img/src/logo.black.mini.png" alt="">
                            <h4 id="name">${data[i][1]}</h4>
                            <p id="desc">${data[i][4]}</p>
                            <em id="ville">${data[i][3]}</em>
                    `);
        }
    });

document.querySelector('#here').addEventListener("click", localisationHere);

function localisationHere() {
    navigator.geolocation.getCurrentPosition(function (position) {

        L.marker([position.coords.latitude, position.coords.longitude], {icon: myloc}).addTo(mymap);
        mymap.setView([position.coords.latitude, position.coords.longitude], 12);

    });
}