<?php
require_once "navigation.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Welcome</title>
    <link rel="stylesheet" href="view/assets/CSS/style.css">
    <script src="assets/js/script.js"></script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<?php if (isset($_GET["searchValue"])){?>
    <main class="main-products">

        <?php
        if (isset($allProducts)) {
        foreach ($allProducts as $product){
            $specification = $product["spec"];
            ?>
            <div class="container" >
                <div class="div-product-img">
                    <img src="<?php   echo $specification["product_url"]; ?>" alt="">
                </div>
                <div style="text-align: center">
                    <h4 class="title"><?php echo $product["category"] ?> </h4>
                    <p class="desc"><?php echo $product["name"]." ".$product["model"] ?> </p>
                    <a href="index.php?target=product&action=getCharactersitics&productId= <?php echo $product["id"] ?>" class="btn btn-danger">Виж</a>
                </div>
            </div>
        <?php }
        $searchValue = $_GET['searchValue'] ? $_GET['searchValue'] : '';
        $pages = (int) $pages;
        for ($i=0; $pages > $i; $i++) {
            $page = $i + 1;
            ?>
            <a href="index.php?searchValue=<?= $searchValue; ?>&target=product&action=searchHome&page=<?= $page ?>"><?= $page ?></a>
        <?php } ?>
    </main>
<?php }
    else{ ?>
        <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#demo" data-slide-to="0" class="active"></li>
                <li data-target="#demo" data-slide-to="1"></li>
                <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://cdn.technomarket.bg/uploads/BG/2019/2-february/1440x500/the-champions-are-here.png" alt="Los Angeles" width="1100" height="500">

                </div>
                <div class="carousel-item">
                    <img src="https://cdn.technomarket.bg/uploads/BG/2019/3-march/tt/new-fever-hp.jpg" alt="Chicago" width="1100" height="500">

                </div>
                <div class="carousel-item">
                    <img src="https://cdn.technomarket.bg/uploads/BG/2019/2-february/1440x500/TM_Samsung_S10_1440x500_003.png" alt="New York" width="1100" height="500">

                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    <?php }
    $searchValue = $_GET['searchValue'] ? $_GET['searchValue'] : '';
    $pages = (int) $pages;
    for ($i=0; $pages > $i; $i++) {
        $page = $i + 1;
    ?>
     <a href="index.php?searchValue=<?= $searchValue; ?>&target=product&action=searchHome&page=<?= $page ?>"><?= $page ?></a>
<?php }
    }?>
</main>
<?php
require_once "footer.php";
?>
</body>
</html>

