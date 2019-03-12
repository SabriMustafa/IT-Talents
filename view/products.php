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
            <select name="brands" id="brands">
                <option value="Choose-brand">Choose</option>
                <?php foreach ($brands as $brand) { ?>

                    <option value="<?= $brand["id"] ?>" <?php echo $selected_brand == $brand["name"] ? "selected " : ""; ?> >
                        <?= $brand["name"] ?></option>
                <?php }; ?>

            </select><br><br>

            <input type="checkbox" name="asc" value="asc">Цена по възходящ ред<br><br>
            <input type="checkbox" name="desc" value="desc">Цена по низходящ ред<br><br>
            <input type="submit" name="filter" value="Търси" class="btn btn-danger">
        </form>
    </div>
</aside>
<div>
    <main class="main-products">
        <?php
        foreach ($allProducts as $product) {
            $specification = $product["spec"];
            $images = $product['images'];
            ?>
            <div class="container">
                <div class="div-product-img">
                    <img src="<?php echo $images[0] ?>" alt="">
                </div>
                <div style="text-align: center">
                    <h4 class="title"><?php echo $product["category"] ?> </h4>
                    <p class="desc"><?php echo $product["name"] . " " . $product["model"] ?> </p>
                    <p class="desc"><?php echo $product["price"] . " лв." ?> </p>

                    <a href="index.php?target=product&action=getCharactersitics&productId=<?= $product["id"] ?>"
                       class="btn btn-danger">Виж</a>
                    <?php if (isset($_SESSION["user"])) { ?>
                        <button class="btn btn-sm btn-primary"
                                id="like_<?= $product["id"] ?>"
                            <?php
                            if (in_array($product["id"], $likedProducts)){
                            ?>
                                onclick="removeFromFavourites(<?= $product["id"] ?>)">
                            Премахни от любими
                            <?php
                            } else {
                                ?>
                                onclick="addToFavourites(<?= $product["id"] ?>)">
                                Добави в любими
                                <?php
                            }
                            ?>

                        </button>
                    <?php }
                    if (isset($_SESSION["user"])) {
                        $isAdmin = $_SESSION["user"]->getIsAdmin();
                    }
                    if (isset($_SESSION["user"]) && $isAdmin == 1) { ?>
                        <form action="index.php?target=admin&action=update" method="post" ">
                        <input type="hidden" name="productId" value="<?= $product["id"] ?>">
                        <input type="submit" name="edit" value="Редактирай продукт" class="btn btn-warning">
                        </form>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </main>
</div>


<div style="padding-top: 20px">


<?php
require_once "footer.php";
?>
</div>

</body>
</html>