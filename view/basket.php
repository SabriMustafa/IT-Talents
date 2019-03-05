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
    <?php
        print_r($_SESSION);
        ?>

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
                    <tr>
                        <td >
                            <img src="<?php echo $_SESSION["img"] ?>" style="width: 100px">
                           <?php echo $_SESSION["tehnika"]["model"] ?>
                        </td>
                        <td><?php echo $_SESSION["tehnika"]["price"]."лв." ?></td>
                        <td><?php echo $_SESSION["quantity"]."бр." ?></td>
                        <td><?php
                            $allMoney = 0;
                            $allMoney += $_SESSION["tehnika"]["price"];
                            echo $allMoney."лв." ?>
                        </td>
                        <td>
                           <button>Поръчаи</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
</body>
</html>
