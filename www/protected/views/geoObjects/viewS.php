<link rel="stylesheet" href="https://maps-js.apissputnik.ru/v0.3/sputnik_maps_bundle.min.css" />

<div id="map1" style="height: 400px" ></div>

<div id="urlAjaxAddress" hidden="">
    <?php echo Yii::app()->createUrl("geoobjects/getcoord"); ?>
</div>

<script src="https://maps-js.apissputnik.ru/v0.3/sputnik_maps_bundle.min.js"></script>

<script type="text/javascript">
    var urlAjaxAddress = $('#urlAjaxAddress').html();
    var map = L.sm.map('map1',{
        center: [54.94349874, 73.38626770],
        zoom: 10
    });

    $.ajax({
        url: urlAjaxAddress,
        type: "POST",
        success: function (data) {
            var objects = JSON.parse(data);
            var iconUrl = '../images/';
            for (var i in objects) {
                var popupContent = '<div class="my-popup-title"><h3><a href="http://cucaracha/geoobjects/'+objects[i].id+'" target="blank">'+objects[i].name+'</a></h3></div>'+
                    '<div class="my-popup-description">'+objects[i].info+'<br>'+objects[i].type_name+'</div>';
                var myIcon = L.icon({
                    iconUrl: iconUrl+objects[i].type+'.png',
                    iconSize: [15, 20]
                });
                var Marker = L.sm.marker([objects[i].coord1, objects[i].coord2],{icon : myIcon});
                Marker.addTo(map);
                Marker.bindPopup(popupContent);
            }
        }
    });

</script>
