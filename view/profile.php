<?php
require_once "navigation.php";


?>


<body>
<main>
    <aside style="margin-left: 30%; margin-bottom: 10px">
        <form action="/IT-Talents/index.php?target=user&action=editProfileView" method="post"  class="form-inline">
            <div class="form-group">
                <a onclick="myFavourites()" class="btn btn-danger form-control">Любими продукти</a>
            </div>
            <div class="form-group">
                <a onclick="myOrders()" class="btn btn-danger form-control">Моите поръчки</a>
            </div>
            <div class="form-group">
                <button type="submit" name="edit" class="btn btn-danger form-control">Редактирай профил</button>
            </div>
        </form>

    </aside>
    <div id="orders" style="display: none" >
        <?php
        if ($orders != null) {
            ?>
            <table class="table">
                <tr>
                    <th>Дата</th>
                    <th>Обща сума</th>

                </tr>
                <?php
                foreach ($orders as $order) { ?>
                    <tr class="success">
                        <td><?= $order["date"] ?></td>
                        <td><?= $order["money"]."лв." ?></td>
                    </tr>
                    <?php
                }?>
            </table>
            <?php
        } else {
            echo "You don't have any ordered products";
        }
        ?>

    </div>


    <div id="favourites" style="display: none">
        <table class="table">
            <tr>
                <th>Име на продукт</th>
                <th>Модел</th>
                <th>Цена</th>

            </tr>
            <?php if ($favourites != null) {
            foreach ($favourites as $favourite) { ?>
                <tr class="success">
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
</main>

<?php
require_once "footer.php";
?>




</body>