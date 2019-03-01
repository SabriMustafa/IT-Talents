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
    <nav class="nav-box">
    <img src="https://cdn.technomarket.bg/uploads/BG/tm-logo.png" width="500px" alt="">
</nav>
    <hr>
    <div class="bodyCharacteristic">
    <div  class="img-char">
        <h4> <?php echo $productModel["model"]; ?></h4>
        <img  src=" <?php echo $allCharacteristics["0"]["images"]; ?>" alt="">
    </div>



        <div class="characteristic">


                <?php foreach ($allCharacteristics as $char){ ?>

                   <p> <?php echo $char["performance"] .PHP_EOL; ?>  </p>

                <?php } ?>
            </table>

        </div>

    </div>
    <article class="char-article">
        <h3>Цена:</h3>
       <h5> <?php echo $productModel["price"]; ?> лв.</h5>
        <a href="#" class="btn btn-sm btn-primary " style="background-color: red " >Купи</a>

    </article>

</body>
</html>