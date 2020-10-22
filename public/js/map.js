let position = location.href.split('?')[1].split('=');
let mymap = L.map('mapid');

function readShop(position) {

    let shop = document.querySelectorAll('#shop')

    for (let i = 0; i < shop.length; i++) {
        if (position === shop[i].querySelector('#loc').value) {
            return `
                        <div>${shop[i].querySelector('#name').innerHTML}</div>
                        <div>${shop[i].querySelector('#desc').innerHTML}</div>
                        <div>${shop[i].querySelector('#ville').innerHTML}</div>
                    `
        }
    }
}

if (position[2] != null) {

    loc = position[2].split(',');
    mymap.setView([loc[0], loc[1]], 12);
    L.marker([loc[0], loc[1]]).addTo(mymap).bindPopup(readShop(position[2])).openPopup();

} else {

    mymap.setView([50.827, 4.371], 12);

}

L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png256?apikey=06ab9be902d942468f7aed0766901751', {
    attribution: 'donn&eacute;es &copy; <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 10,
    maxZoom: 18
}).addTo(mymap);

fetch('src/map.public.controller.php')

    .then(response => response.json())

    .then((data) => {

        for (let i = 0; i < data.length; i++) {

            let lat = data[i][2].split(',');
            L.marker([lat[0], lat[1]]).addTo(mymap).bindPopup(`
                        <div>${data[i][1]}</div>
                        <div>${data[i][4]}</div>
                        <div>${data[i][3]}</div>
                    `);
        }
    });

document.querySelector('#here').addEventListener("click", localisationHere);

function localisationHere() {
    navigator.geolocation.getCurrentPosition(function (position) {

        let markerHere = L.marker([position.coords.latitude, position.coords.longitude]).addTo(mymap);
        markerHere.bindPopup("Vous êtes ici !").openPopup();
        mymap.setView([position.coords.latitude, position.coords.longitude], 12);

    });
}