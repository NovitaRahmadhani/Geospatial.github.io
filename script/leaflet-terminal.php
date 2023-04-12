<script type="text/javascript" src="assets/jkt-terminal-bandara.js"></script>
<script>
        var centerLatLng = [-6.2248443, 106.8647405,17];
        var mapOptions = {
            center: centerLatLng,
            zoom: 11.5
        }
        var map = L.map('map', mapOptions);

        var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
    tileLayer.addTo(map);

    function getDescription(feature, layer){
        if (feature.properties) {
            var popupContent = "";
            if (feature.properties.NAMOBJ) {
                popupContent += feature.properties.NAMOBJ;
            }
            layer.bindPopup(popupContent);
        }
    }

    geojson = L.geoJSON(data, {
        onEachFeature : getDescription
    }).addTo(map);
    
        
   
</script>