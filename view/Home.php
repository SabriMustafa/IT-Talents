<?php
require_once "navigation.php";
?>

<div class="container">
    <?php
    foreach ($allProducts as $product){
        ?>
        <div class="container" >
            <div class="div-product-img">
                <img src="" alt="">
            </div>
            <div style="text-align: center">
                <h4 class="title"><?php echo $product["category"] ?> </h4>
                <p class="desc"><?php echo $product["name"]." ".$product["model"] ?> </p>
                <a href="index.php?target=product&action=getCharactersitics&productId= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary ">Виж</a>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>
