<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="assets/CSS/style.css">
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

</body>


</html>