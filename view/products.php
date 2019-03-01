<?php
//require_once "../model/AbstractDao.php";
//require_once "../model/ProductDao.php";

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

<div class="container" >

    <?php foreach ($allProducts as $product){
        $getImg = $products->getProductSpecification($product["id"])
        ?>
        <div class="row">
            <div class="col-md-4">
                    <div class="img-wrap"><img class="img-wrap" src="<?php echo $getImg[0]["images"] ?>"></div>
                    <figcaption class="info-wrap">
                        <h4 class="title"><?php echo $product["category"] ?> </h4>
                        <p class="desc"><?php echo $product["model"] ?> </p>
                    </figcaption>
                    <div class="bottom-wrap">
                        <div class="price-wrap h5">
                            <span class="price-new"><?php echo $product["price"]."лв." ?>

                            </span>

                        </div>
                        <a href="characteristic.php?productID= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary float-right">Виж</a>
                    </div>
            </div> <!-- col // -->

        </div> <!-- row.// -->
   <?php } ?>



</div>

</article>
</body>
</html>