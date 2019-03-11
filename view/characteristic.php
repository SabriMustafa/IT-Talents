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
    <title>Document</title>
    <link rel="stylesheet" href="view/assets/CSS/style.css">
</head>
<body>
<hr>
<div class="bodyCharacteristic">
    <div  class="img-char">
        <h4> <?php echo $productModell["model"]; ?></h4>
        <img  src=" <?=$images[0]?>" alt="">
    </div>



    <div class="characteristic">


        <?php
        foreach ($allCharacteristics as $char){ ?>

            <p> <?php echo $char["performance"] .PHP_EOL; ?>  </p>

        <?php } ?>
        </table>

    </div>

</div>

<article class="char-article">
    <h3>Цена:</h3>
    <h5> <?php echo $productModell["price"]; ?> лв.</h5>
    <a href="index.php?target=basket&action=addProduct&productId=<?php echo $productId ?>" class="btn btn-danger" style="background-color: red " >Купи</a>
    <?php
    if (isset($_SESSION["user"])) {
        $isAdmin = $_SESSION["user"]->getIsAdmin();
    }
    if (isset($_SESSION["user"]) && $isAdmin == 1) { ?>
    <form action="index.php?target=admin&action=update" method="post" ">
    <input type="hidden" name="productId" value="<?= $productId ?>">
    <input type="submit" name="edit" value="Редактирай продукт" class="btn btn-warning">
    </form>
    <?php }?>
</article>

<br><br><br><br><br><br><br><br>
<div >
    <?php
    foreach ($images as $img){
        ?>
        <img width="150px"  src="<?=$img?>">
        <?php
    }
    ?>
</div>
<?php
require_once "footer.php";
?>
</body>

</html>