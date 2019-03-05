<?php
namespace controller;
use model\ProductDao;

class BasketController{
    public function pullSession(){
        $product = new ProductDao();
        $productId=$_GET["productId"];

        $arr = [];

        $productModell = $product->getProductModel($productId);
        $allCharacteristics = $product->getProductSpecification($productId);
        foreach ($allCharacteristics as $value){
            $arr["img"] = $value["images"];
        }
        $arr["productId"] = $productId;
        $arr["model"] = $productModell["model"] ;
        $arr["price"] = $productModell["price"] ;
        $arr["quantity"] = 1;
        $_SESSION = $arr;


        include __DIR__ . "/../view/basket.php";
    }

    public function buyProductDelQuantity(){
        $product = new ProductDao();
        $id = $_GET["productId"];
        $quantity = $_GET["quantity"];

        include __DIR__ . "/../view/BoughtProducts.php";

    }


}