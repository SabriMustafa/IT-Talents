<?php
require_once "../model/AbstractDao.php";
require_once "../model/ProductDao.php";

$id = $_GET["subcategory"];
$products = new \model\ProductDao();
$allProducts = $products->getProductsBySubID($id);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/CSS/style.css">
    <title>Product</title>
</head>
<body>
<nav class="nav-box">
    <img src="https://cdn.technomarket.bg/uploads/BG/tm-logo.png" width="500px" alt="">
</nav>
<aside class="aside-products">

</aside>
<main class="main-products">
    <?php foreach ($allProducts as $product){
    $getImg = $products->getProductSpecification($product["id"])
    ?>
    <div class="container" >
        <div class="div-product-img">
            <img src="<?php echo $getImg[0]["images"] ?>" alt="">
         </div>
        <div style="text-align: center">
            <h4 class="title"><?php echo $product["category"] ?> </h4>
            <p class="desc"><?php echo $product["name"]." ".$product["model"] ?> </p>
            <a href="characteristic.php?productID= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary ">Виж</a>
        </div>




    </div>
    <?php } ?>
</main>


</article>
</body>
</html>