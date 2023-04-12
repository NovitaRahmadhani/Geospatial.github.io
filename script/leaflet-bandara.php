<script type="text/javascript" src="assets/jkt-bandara.js"></script>
<script>
        var centerLatLng = [-6.2651398, 106.8841047];
        var mapOptions = {
            center: centerLatLng,
            zoom: 13
        }
        var map = L.map('map', mapOptions);

        var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
    tileLayer.addTo(map);

    var geojson = L.geoJSON(data).addTo(map);
   
</script>