<div id="map" style="width:600px; height:400px"></div>

<div id="urlAjaxAddress" hidden="">
    <?php echo Yii::app()->createUrl("vsgeo/getcoord"); ?>
</div>

<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>

<script type="text/javascript">
    var map;
    var urlAjaxAddress = $('#urlAjaxAddress').html();

    DG.then(function () {
        map = DG.map('map', {
            center: [54.94349874, 73.38626770],
            zoom: 13
        });

        $.ajax({
            url: urlAjaxAddress,
            type: "POST",
            success: function (data) {
                var objects = JSON.parse(data);
                for (var i in objects) {
                    DG.marker([objects[i].coord1, objects[i].coord2]).addTo(map).bindPopup(objects[i].address);
                }
            }
        });
    });
</script>