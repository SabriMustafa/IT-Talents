<?php
require_once "navigation.php";


?>


<body>
<aside style="float: left;width: 20%; ">
    <button onclick="myFavourites()" class="btn btn-danger">Любими продукти</button>
    <br><br>

    <button onclick="myOrders()" class="btn btn-danger">Моите поръчки</button>
    <br><br>

    <form action="/IT-Talents/index.php?target=user&action=editProfileView" method="post">
        <input type="submit" name="edit" value="Редактирай профил" class="btn btn-danger">
    </form>

</aside>
<div id="orders" style="display: none;width: 20%;float: left" >
    <table class="table-profile">
        <tr  class="table-profile">
            <th  class="table-profile">Дата</th>
            <th >Обща сума</th>

        </tr>
        <?php

        foreach ($orders as $order) { ?>
            <tr>
                <td class="table-profile"><?= $order["date"] ?></td>
                <td><?= $order["money"]."лв." ?></td>
            </tr>
        <?php } ?>
    </table>


</div>

<div id="messages">
    <?php
    $messageHandler = \Message\MessageHandler::getInstance();
    foreach ($messageHandler->getMessages() as $message) {
        $style = 'color:green';
        if ($message['type'] === \Message\MessageHandler::MESSAGE_TYPE_ERROR) {
            $style = 'color:red';
        }
        echo "<p style=$style>" . $message['message'] . "</p>";
    }
    ?>
</div>
<div id="favourites" style="display: none;width: 20%;float: left">
    <table class="table-profile">
        <tr>
            <th class="table-profile">Име на продукт</th>
            <th class="table-profile">Модел</th>
            <th class="table-profile">Цена</th>

        </tr>
        <?php if ($favourites != null) {
        foreach ($favourites as $favourite) { ?>
            <tr>
                <td class="table-profile"><?= $favourite["name"] ?></td>
                <td><?= $favourite["model"] ?></td>
                <td class="table-profile"><?= $favourite["price"] ?></td>
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
        var messages = document.getElementById('messages');
        if (messages.style.display !== "none") {
            messages.style.display = "none";
        }
        if (orders.style.display === "none") {
            orders.style.display = "block";
        } else {
            orders.style.display = "none";
        }
    }

    function myFavourites() {
        var fav = document.getElementById("favourites");
        var messages = document.getElementById('messages');
        if (messages.style.display !== "none") {
            messages.style.display = "none";
        }
        if (fav.style.display === "none") {
            fav.style.display = "block";
        } else {
            fav.style.display = "none";
        }
    }
</script>

</body>

