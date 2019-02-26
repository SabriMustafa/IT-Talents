<?php
namespace view;
require_once "../model/AbstractDao.php";
require_once "../model/ProductDao.php";

$categories = new \model\ProductDao();
$results = $categories->getAllCategories();



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tehnomarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

    <img src="https://cdn.technomarket.bg/uploads/BG/tm-logo.png" width="500px" style="margin-left: 450px">

    <div class="form-group has-search" >
        <form >
            <input type="text" class="form-control" placeholder="Search" style="width: 200px">
            <input type="submit" name="search" value="Search">
        </form>
        </div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
        <ul class="nav navbar-nav" style="margin-left: 250px">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?php echo $results["0"]["name"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    $id = $results["0"]["id"];
                    $subCategories = $categories->getSubCategoriesById("$id");
                    foreach ($subCategories as $subCategory ) {?>
                        <li><a href="products.php?subcategory=<?php echo $subCategory["id"] ?>"><?php echo $subCategory["name"] ?></a></li>
                    <?php } ?>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?php echo $results["1"]["name"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    $id = $results["1"]["id"];
                    $subCategories = $categories->getSubCategoriesById("$id");
                    foreach ($subCategories as $subCategory ) {?>
                        <li><a href="products.php?subcategory=<?php echo $subCategory["id"] ?>"><?php echo $subCategory["name"] ?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><?php echo $results["2"]["name"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    $id = $results["2"]["id"];
                    $subCategories = $categories->getSubCategoriesById("$id");
                    foreach ($subCategories as $subCategory ) {?>
                        <li><a href="products.php?subcategory=<?php echo $subCategory["id"] ?>"><?php echo $subCategory["name"] ?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><?php echo $results["3"]["name"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    $id = $results["3"]["id"];
                    $subCategories = $categories->getSubCategoriesById("$id");
                    foreach ($subCategories as $subCategory ) {?>
                        <li><a href="products.php?subcategory=<?php echo $subCategory["id"] ?>"><?php echo $subCategory["name"] ?></a></li>
                    <?php }?>
                </ul>
            </li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" ><?php echo $results["4"]["name"] ?><span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <?php
                    $id = $results["4"]["id"];
                    $subCategories = $categories->getSubCategoriesById("$id");
                    foreach ($subCategories as $subCategory ) {?>
                        <li><a href="products.php?subcategory=<?php echo $subCategory["id"] ?>"><?php echo $subCategory["name"] ?></a></li>
                    <?php }?>
                </ul>
            </li>
        </ul>
    </div>
</nav>


<div class="container">
    <h3>Navbar With Dropdown</h3>
    <p>This example adds a dropdown menu for the "Page 1" button in the navigation bar.</p>
</div>

</body>
</html>
