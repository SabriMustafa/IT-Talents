<?php
require "navigation.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Кошница</title>
</head>
<body>
<h1 style="margin-left: 110px">Потребителска кошница</h1>

<div class="basket-box">
    <table class="table table-bordered">
        <thead>
        <tr>

            <th>Продукт</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Общо</th>
            <th> </th>

        </tr>
        </thead>
        <tbody >

        <?php
        if (isset($_SESSION["products"])) {
            foreach ($_SESSION["products"] as $productId => $product) {

                ?>

                <tr>
                    <td>
                        <img src="<?php echo $product["image"] ?>" style="width: 100px">
                        <?php echo $product["model"] ?>
                    </td>
                    <td><?php echo $product["price"] . "лв." ?></td>
                    <td><?php echo $product["quantity"] . "бр." ?></td>
                    <td><?php echo $product["price"] . "лв." ?>
                    </td>
                    <td>
                        <button class="btn btn-outline-primary">
                            <a href="
                           index.php?target=basket&action=deleteProduct&productId=<?php echo $productId ?>">Изтрий </a>
                        </button>
                    </td>
                </tr>
            <?php }
        }?>
        <tr>
            <td>
                <?php if (isset($_SESSION['user'])) {?>
                <button class="btn btn-danger">
                    <a href="
                           index.php?target=basket&action=buy">Поръчай </a>
                </button>
                <?php }; ?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<br>
<br>

</body>
</html>
<?php
require_once "footer.php";
?>
