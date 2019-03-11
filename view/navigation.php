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
<div class="navigation-button">
    <?php
    if (isset($_SESSION["user"])) {
        $isAdmin = $_SESSION["user"]->getIsAdmin();?>
        <form action="index.php?target=basket&action=basketView" method="post">
            <input type="submit" value="Количка" class="btn btn-danger">
        </form>

     <?php
    }
    if (isset($_SESSION["user"]) && $isAdmin == 1) { ?>
        <form action="index.php?target=admin&action=index" method="post">
            <input type="submit" value="Добави продукти" class="btn btn-warning">
        </form>
    <?php }

    if (!isset($_SESSION["user"])) {
        ?>
      <div class="login-button" ">
          <form action="index.php?target=user&action=loginView" method="post">
              <input type="submit" value="Login" class="btn btn-danger">
          </form>
      </div>
        <div class="register-button">
            <form action="index.php?target=user&action=registerView" method="post">
                <input type="submit" value="Register" class="btn btn-danger">
            </form>
        </div>
        <?php
    }
    if (isset($_SESSION["user"])) { ?>
        <form action="index.php?target=user&action=getProfileData" method="post">
            <input type="submit" value="Профил" class="btn btn-danger">
        </form>
    <form action="index.php?target=user&action=exitProfile" method="post">
        <input type="submit" value="Изход" class="btn btn-danger">
    </form>
    <?php } ?>
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
</body>

