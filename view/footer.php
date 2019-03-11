<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="view/assets/CSS/style.css">
</head>

<body>
<footer>
    <div id="footer-left">
        <h3>Контакти</h3>
        <p>Йордан Михайлов</p
        <p> 0883465672</p>
        <br>
        <p>Сабри Мустафа</p>
        <p> 0895334146</p>
    </div>
    <div  id="footer-midle">

        <h3>Партньори</h3><br>
        <p>ИТ Таланти</p>
        <br>
        <p>Софийска Вода АД</p>
        <br>
        <p> Теленор ЕАД</p>
    </div>
    <div  id="footer-right">
        <h2>Карта</h2>
        <div id="googleMap" style="width:100%"><div class="mapouter"><div class="gmap_canvas"><iframe width="324" height="107" id="gmap_canvas" src="https://maps.google.com/maps?q=it%20talents&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.jetzt-drucken-lassen.de">jetzt-drucken-lassen.de</a></div><style>.mapouter{text-align:right;height:107px;width:324px;}.gmap_canvas {overflow:hidden;background:none!important;height:107px;width:324px;}</style>Google Maps by <a href="https://www.embedgooglemap.net" rel="nofollow" target="_blank">Embedgooglemap.net</a></div></div>

        <script>
            function myMap() {
                var mapProp= {
                    center:new google.maps.LatLng(51.508742,-0.120850),
                    zoom:5,
                };
                var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
            }
        </script>

    </div>



</footer>

</body>


</html>