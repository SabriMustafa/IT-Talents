<?php
require_once "navigation.php";
//require_once "../model/AbstractDao.php";
//require_once "../model/ProductDao.php";

?>

    <input type="hidden" id="<?php echo $_GET["subcategory"] ?>" value="<?php echo $_GET["subcategory"] ?>">


<body>
<nav class="nav-box">

</nav>
<aside class="aside-products">
    <div>
        <h5>Марки</h5>
        <select name="brands" id="brands" onchange="filter()">

            <option value="All">All</option>
            <option value="Asus">Asus</option>
            <option value="Dell">Dell</option>
        </select>
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
        var subCategories= document.getElementById("subCategory").value;
        var brands = document.getElementById("brands").value;

        window.location = "index.php?target=product&action=getSubcategory&subcategory="+subCategories + "&brands=" + brands;

    }
</script>
</body>
</html>