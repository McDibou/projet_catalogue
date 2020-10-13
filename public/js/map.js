let mymap = L.map('mapid').setView([50.827, 4.371], 12);

L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png256?apikey=06ab9be902d942468f7aed0766901751', {
    attribution: 'donn&eacute;es &copy; <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
    minZoom: 10,
    maxZoom: 16,
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);


fetch('src/map.public.controller.php')

    .then( response => response.json() )

    .then( (data) => {

        for(let i = 0; i < data.length; i++) {

            let lat = data[i][2].split(',')
            let marker = L.marker([lat[0], lat[1]]).addTo(mymap);
            marker.bindPopup(data[i][3]);

        }
    });

navigator.geolocation.getCurrentPosition(function(position) {

    let markerHere = L.marker([''+position.coords.latitude, ''+position.coords.longitude]).addTo(mymap);
    markerHere.bindPopup("Vous êtes ici !").openPopup();

});

