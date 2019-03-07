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

<aside class="aside-products">

    <div>
        <form action="index.php?target=product&action=getFilteredSubcategory" method="post">
            <input type="hidden" name="subCategories" id="subCategories" value="<?php echo $subCategoryId ?>">
        <h5>Марки</h5>
        <select name="brands" id="brands" >
            <option value="Choose-brand">Choose</option>
            <?php  foreach ($brands as $brand) { ?>

                <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                    <?= $brand["name"] ?></option>
            <?php }; ?>

        </select><br><br>

        <input type="checkbox" name="asc" value="asc">Цена по възходящ ред<br><br>
        <input type="checkbox" name="desc" value="desc">Цена по низходящ ред<br><br>
        <input type="submit" name="filter" value="Търси">
        </form>
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
                <p class="desc"><?php echo $product["price"]." лв." ?> </p>

                <a href="index.php?target=product&action=getCharactersitics&productId= <?php echo $product["id"] ?>" class="btn btn-sm btn-primary ">Виж</a>
                <button class="btn btn-sm btn-primary" id="ajax" value="<?php echo $product["id"] ?>" onclick="addToFavourites()">Добави в любими</button>
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

<?php
require_once "footer.php";
?>
</body>
</html>

<script>
    function addToFavourites() {

    }


</script>