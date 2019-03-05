<?php
namespace controller;
use model\ProductDao;

class BasketController{
   public function pullSession(){
       $product = new ProductDao();
       $productId=$_GET["productId"];
       $i = 0;
       $_SESSION = [ ];

       $productModell = $product->getProductModel($productId);
       $allCharacteristics = $product->getProductSpecification($productId);
       foreach ($allCharacteristics as $value){
           $_SESSION["img"] = $value["images"];
       }


       $_SESSION["tehnika"] = $productModell;
       $_SESSION["quantity"] = 1;
       $i = $i+$i;

       include __DIR__ . "/../view/basket.php";
   }
}