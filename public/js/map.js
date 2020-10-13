let mymap = L.map('mapid').setView([50.847, 4.371], 5);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 18,
    tileSize: 512,
    zoomOffset: -1
}).addTo(mymap);


fetch('src/map.public.model.php')
    .then( (response) => {return response.json()} )

    .then( (responseJSON) => {

        for(let i = 0; i < responseJSON.length; i++) {
            let lat = responseJSON[i][2].split(',')
            let marker = L.marker([lat[0], lat[1]]).addTo(mymap);
            marker.bindPopup(responseJSON[i][3]).openPopup();


        }
    });

navigator.geolocation.getCurrentPosition(function(position) {
    console.log(position.coords.latitude, position.coords.longitude);
    let markerHere = L.marker([''+position.coords.latitude, ''+position.coords.longitude]).addTo(mymap);
    markerHere.bindPopup("Vous êtes ici !").openPopup();


});
