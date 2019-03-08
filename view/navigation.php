<?php
namespace view;
use model\ProductModel;

$productModel = new ProductModel();
$categories=$productModel->getCategories();
$user = "Гост";
if(isset($_SESSION['user'])){
    $user = $_SESSION['user']->getFirstName();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <h4>Здравей, <?=$user?></h4>
    <title>Technomarket</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="view/assets/CSS/style.css">
</head>
<body>

<img src="https://cdn.technomarket.bg/uploads/BG/tm-logo.png" width="500px" style="margin-left: 450px">

<div class="form-group has-search">
    <form action="index.php?target=product&action=searchHome" method="post">
        <input type="text" class="form-control" placeholder="Search" style="width: 200px" name="searchValue">
        <input type="submit" name="search" value="Search">
    </form>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">

        </div>
        <ul class="nav navbar-nav" style="margin-left: 250px">
            <?php

            foreach ($categories as $category) {
                ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?= $category["name"] ?><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                        foreach ($category['subcategories'] as $sub) {
                            ?>
                            <li>
                                <a href="index.php?target=product&action=getSubcategory&subcategory=<?php echo $sub["id"] ?>"><?php echo $sub["name"] ?></a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
</nav>

