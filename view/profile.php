<?php
require_once "navigation.php";


?>


<body>
<aside>
    <button onclick="myFavourites()">My favourites</button>
    <br><br>

    <button onclick="myOrders()">My orders</button>
    <br><br>

    <form action="/IT-Talents/index.php?target=user&action=editProfileView" method="post">
        <input type="submit" name="edit" value="Edit profile">
    </form>

</aside>
<div id="orders" style="display: none">
    <table>
        <tr>
            <th>Date</th>
            <th>Spent Money</th>

        </tr>
        <?php

        foreach ($orders as $order) { ?>
            <tr>
                <td><?= $order["date"] ?></td>
                <td><?= $order["money"] ?></td>
            </tr>
        <?php } ?>
    </table>


</div>

<div id="favourites" style="display: none">
    <table>
        <tr>
            <th>Product Name</th>
            <th>Model</th>
            <th>Price</th>

        </tr>
        <?php if ($favourites != null) {
        foreach ($favourites as $favourite) { ?>
            <tr>
                <td><?= $favourite["name"] ?></td>
                <td><?= $favourite["model"] ?></td>
                <td><?= $favourite["price"] ?></td>
            </tr>
        <?php }
        ?>
    </table>
    <?php
    } else {
        echo "You don't have any favoutite products";

    }
    ?>

</div>
<script>

    function myOrders() {
        var orders = document.getElementById("orders");
        if (orders.style.display === "none") {
            orders.style.display = "block";
        } else {
            orders.style.display = "none";
        }
    }

    function myFavourites() {

        var fav = document.getElementById("favourites");
        if (fav.style.display === "none") {
            fav.style.display = "block";
        } else {
            fav.style.display = "none";
        }
    }
</script>

</body>

