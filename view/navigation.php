<?php
namespace view;

use controller\ProductController;

$productController = new ProductController();
$categories = $productController->getCategories();
$user = "Гост";
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']->getFirstName();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <h4>Здравей, <?= $user ?></h4>
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
    <form action="index.php" method="get">
        <input type="text" class="form-control" placeholder="Search" style="width: 200px" name="searchValue">
        <input type="hidden" name="target" value="product">
        <input type="hidden" name="action" value="searchHome">
        <input type="submit" name="search" value="Search" class="btn btn-danger">
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
            if (isset($_SESSION["user"])) {
            ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION["user"]->getFirstName() ?><span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <?php
                            if ($_SESSION["user"]->getIsAdmin()) {
                        ?>
                        <li>
                            <a href="index.php?target=admin&action=index">Добави продукти</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="index.php?target=basket&action=basketView">Количка</a>
                        </li>
                        <li>
                            <a href="index.php?target=user&action=getProfileData">Профил</a>
                        </li>
                        <li>
                            <a href="index.php?target=user&action=exitProfile">Изход</a>
                        </li>
                    </ul>
                </li>
            <?php
            } else { ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">Login/Register<span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="index.php?target=user&action=loginView">Login</a>
                        </li>
                        <li>
                            <a href="index.php?target=user&action=registerView">Register</a>
                        </li>
                    </ul>
                </li>
            <?php }?>
        </ul>
    </div>
</nav>
</body>

