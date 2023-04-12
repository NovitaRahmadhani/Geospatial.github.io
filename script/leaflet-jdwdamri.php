<?php
$con = mysqli_connect("localhost", "root", "", "dbbusdamri");
$data_jdw = array();
if ($con) {
    $result = mysqli_query($con, "SELECT * FROM tbl_jadwal");
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        $data_jdw[] = $row;
    }
}
mysqli_close($con);
?>


<script type="text/javascript" src="assets/jkt-terminal-bandara.js"></script>
<script>
        var centerLatLng = [-6.2248443, 106.8647405,17];
        var mapOptions = {
            center: centerLatLng,
            zoom: 11
        }
        var map = L.map('map', mapOptions);

        var tileLayer = new L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});
    tileLayer.addTo(map);

    var dataJdw = <?php  echo json_encode($data_jdw); ?>

    function getDescription(feature, layer){
        var popupContent = "";
        if (feature.properties.OBJECTID) {
            var idx = feature.properties.OBJECTID - 1;
            popupContent += "Terminal: " + dataJdw[idx]['nama_terminal'] + "<br>" +
           "Jadwal Keberangkatan: " + dataJdw[idx]['jdw_keberangkatan'] + "<br>" +
           "Tarif: " + dataJdw[idx]['tarif'];
        } else {
            popupContent += "Terjadi error saat mengambil data";
        }
            layer.bindPopup(popupContent);
        }
    

    geojson = L.geoJSON(data, {
        onEachFeature : getDescription
    }).addTo(map);
    
        
   
</script>