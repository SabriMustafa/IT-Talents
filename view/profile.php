<?php
require_once "navigation.php";


?>


<body>
<aside>
    <form action="../index.php?target=user&action=getFavourites" method="post">
        <input type="submit" name="favourites" value="Favourites">
    </form>
    <form action="../index.php?target=user&action=getAllOrders" method="post">
        <input type="submit" name="orders" value="My orders">
    </form>
    <form action="/IT-Talents/index.php?target=user&action=editProfileView" method="post">
        <input type="submit" name="edit" value="Edit profile">
    </form>

</aside>
<div>
    <table>
        <tr>
            <th>Date</th>
            <th>Spent Money</th>

        </tr>
        <?php foreach ($orders as $order){ ?>
        <tr>
            <td><?= $order["date"] ?></td>
            <td><?= $order["money"] ?></td>
        </tr>
        <?php } ?>
    </table>


</div>

<div>
    <table>
        <tr>
            <th>Product Name</th>
            <th>Model</th>
            <th>Price</th>

        </tr>
        <?php foreach ($favourites as $favourite){ ?>
            <tr>
                <td><?= $favourite["name"] ?></td>
                <td><?= $favourite["model"] ?></td>
                <td><?= $favourite["price"] ?></td>
            </tr>
        <?php } ?>
    </table>


</div>


</body>

