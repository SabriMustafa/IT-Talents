<?php
require_once "../model/AbstractDao.php";
require_once "../model/ProductDao.php";
$id = $_GET["productID"];
$characteristics = new \model\ProductDao();
$allCharacteristics = $characteristics->getProductSpecification($id);
$productModel = $characteristics->getProductModel($id);


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Техномаркет</title>
</head>
<body>
    <div class="bodyCharacteristic">
    <div  class="img-char">
        <span> <?php echo $productModel["model"]; ?></span>
        <img  src=" <?php echo $allCharacteristics["0"]["images"]; ?>" alt="">
    </div>



        <div class="characteristic">


                <?php foreach ($allCharacteristics as $char){ ?>

                   <p> <?php echo $char["performance"] .PHP_EOL; ?>  </p>

                <?php } ?>
            </table>

        </div>

    </div>

</body>
</html>