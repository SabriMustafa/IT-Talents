<?php

?>



<footer>
    <div id="footer-left">
        <h2>Контакти</h2>
        <p>Йордан Михайлов</p><br>
        <p> 0883465672</p><br>
        <p>Сабри Мустафа</p><br>
        <p> 0888888888</p><br>
    </div>
    <div  id="footer-midle">
        <h2>Партньори</h2><br>
        <p>Софийска Вода АД</p><br>
        <p> Теленор </p><br>
    </div>
    <div  id="footer-right">
        <h2>Карта</h2>
        <div id="googleMap" style="width:100%;height:400px;"></div>

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
