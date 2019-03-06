<?php
require_once "navigation.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/CSS/style.css">
    <script src="assets/js/script.js"></script>
</head>
<body>
<main class="main-products">
    <?php
    foreach ($allProducts as $product){
    $specification = $product["spec"];
    ?>
    <div class="container" >
            <div class="div-product-img">
                <img src="<?php   echo $specification["product_url"]; ?>" alt="">
            </div>
            <div style="text-align: center">
                <h4 class="title"><?php echo $product["category"] ?> </h4>
                <p class="desc"><?php echo $product["name"]." ".$product["model"] ?> </p>
                <a href="index.php?target=product&action=getCharactersitics&productId= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary ">Виж</a>
            </div>
        </div>
    <?php } ?>
</main>

</body>
</html>

