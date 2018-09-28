<div id="map" style="width: 600px; height: 400px" ></div>

<div id="urlAjaxAddress" hidden="">
    <?php echo Yii::app()->createUrl("geoobjects/getcoord"); ?>
</div>

<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>

<script type="text/javascript">
    var myMap;
    var urlAjaxAddress = $('#urlAjaxAddress').html();
    ymaps.ready(init);

    function init(){
        myMap = new ymaps.Map("map", {
            center: [54.94349874, 73.38626770],
            zoom: 15
        });

        $.ajax({
            url: urlAjaxAddress,
            type: "POST",
            success: function (data) {
                var objects = JSON.parse(data);
                for (var i in objects) {
                    var myPlacemark = new ymaps.Placemark([objects[i].coord1, objects[i].coord2], {
                        hintContent: objects[i].name,
                        balloonContent: objects[i].info
                    });
                    myMap.geoObjects.add(myPlacemark);
                }
            }
        });
    }
</script>
