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
            <input type="submit" name="filter" value="Търси">
        </form>
    </div>
</aside>
<main class="main-products">
    <?php
    foreach ($allProducts as $product) {
        $specification = $product["spec"];
        ?>
        <div class="container">
            <div class="div-product-img">
                <img src="<?php echo $specification[0]["images"] ?>" alt="">
            </div>
            <div style="text-align: center">
                <h4 class="title"><?php echo $product["category"] ?> </h4>
                <p class="desc"><?php echo $product["name"] . " " . $product["model"] ?> </p>
                <p class="desc"><?php echo $product["price"] . " лв." ?> </p>

                <a href="index.php?target=product&action=getCharactersitics&productId=<?= $product["id"] ?>"
                   class="btn btn-sm btn-primary ">Виж</a>
                <button class="btn btn-sm btn-primary"
                        id="like_<?= $product["id"] ?>"
                        onclick="addToFavourites(<?= $product["id"] ?>, 'add')">
                    Добави в любими
                </button>
                <?php
                if (isset($_SESSION["user"])) {
                    $isAdmin = $_SESSION["user"]->getIsAdmin();
                }
                if (isset($_SESSION["user"]) && $isAdmin == 1) { ?>
                    <form action="index.php?target=admin&action=update" method="post" ">
                    <input type="hidden" name="productId" value="<?= $product["id"] ?>">
                    <input type="submit" name="edit" value="Редактирай продукт">
                    </form>
                <?php } ?>
            </div>
        </div>
    <?php } ?>
</main>

</article>


<?php
//require_once "footer.php";
?>
</body>
</html>

<script>
    function addToFavourites(productId, action) {
        fetch("http://localhost/IT-Talents/index.php?target=user&action=addToFavourites", {
            method: "POST",
            body: JSON.stringify({
                productId: productId,
                action: action
            })
        }).then(function (response) {
            return response.json();
        }).then(function (json) {
            console.log(json);
            if (json.success) {
                likeButton = document.getElementById("like_" + productId);
                likeButton.innerHTML = "Премахни от любими";
                likeButton.setAttribute("onClick", "addToFavourites(" + productId + ",'remove')");
                likeButton.onclick = function () {
                    return false;
                }
                likeButton.onclick = addToFavourites(productId, 'remove');
            } else {
                console.log("Could not like!");
            }
        });
    }


</script>