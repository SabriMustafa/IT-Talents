<?php
require_once "navigation.php";
//require_once "../model/AbstractDao.php";
//require_once "../model/ProductDao.php";
//$id = $_GET["productID"];
//$characteristics = new \model\ProductDao();
//$allCharacteristics = $characteristics->getProductSpecification($id);
//$productModel = $characteristics->getProductModel($id);


?>


<body>

    <hr>
    <div class="bodyCharacteristic">
    <div  class="img-char">
        <h4> <?php echo $productModell["model"]; ?></h4>
        <img  src=" <?php echo $allCharacteristics["0"]["images"]; ?>" alt="">
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
        <a href="#" class="btn btn-sm btn-primary " style="background-color: red " >Купи</a>

    </article>

</body>
</html>