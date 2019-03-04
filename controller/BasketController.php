<?php
namespace controller;
use model\ProductDao;

class BasketController{
   public function pullSession(){
       $product = new ProductDao();
       $productId=$_GET["productId"];

       $productModell = $product->getProductModel($productId);
       $allCharacteristics = $product->getProductSpecification($productId);
       foreach ($allCharacteristics as $value){
           $_SESSION["img"] = $value["images"];
       }


       $_SESSION["tehnika"] = $productModell;
       $_SESSION["quantity"] = 1;

       include __DIR__ . "/../view/basket.php";
   }
}