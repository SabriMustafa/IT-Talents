<?php
require_once "navigation.php";

?>

<head>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/CSS/style.css">

</head>
<body>
<input type="hidden" id="subCategories" value="<?php echo $subCategory ?>">
<aside class="aside-products">
    <div>
        <h5>Марки</h5>
        <select name="brands" id="brands" >
            <option value="Choose-brand">Choose</option>
            <?php var_dump($brands); foreach ($brands as $brand) { ?>

                <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                    <?= $brand["name"] ?></option>
            <?php }; ?>

        </select><br><br>

        <input type="checkbox" name="asc" value="asc">Цена по възходящ ред<br><br>
        <input type="checkbox" name="desc" value="desc">Цена по низходящ ред<br><br>
        <input type="submit" name="filter" value="Търси">
    </div>
</aside>
<main class="main-products">
    <?php
    foreach ($allProducts as $product){
        $specification = $product["spec"];


        ?>
        <div class="container" >
            <div class="div-product-img">
                <img src="<?php echo $specification[0]["images"] ?>" alt="">
            </div>
            <div style="text-align: center">
                <h4 class="title"><?php echo $product["category"] ?> </h4>
                <p class="desc"><?php echo $product["name"]." ".$product["model"] ?> </p>
                <a href="index.php?target=product&action=getCharactersitics&productId= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary ">Виж</a>
            </div>
        </div>
    <?php } ?>
</main>

</article>

<script>
    function filter() {
        var subCategories = document.getElementById("subCategories").value;
        var brands = document.getElementById("brands").value;
        window.location = "index.php?target=product&action=getSubcategory&subcategory="+ subCategories +"&brands=" + brands;

    }
</script>
</body>
</html>
