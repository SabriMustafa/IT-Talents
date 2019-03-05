<?php
namespace controller;
use model\Order;
use model\OrderDao;
use model\ProductDao;

class BasketController{

    public function addProduct(){
        $productDao = new ProductDao();
        $productId = $_GET["productId"];

        $product = $productDao->getProductById($productId);
        $allCharacteristics = $productDao->getProductSpecification($productId);
        foreach ($allCharacteristics as $value){
            $arr["img"] = $value["images"];
        }
        $arr["model"] = $product["model"] ;
        $arr["price"] = $product["price"] ;
        $arr["quantity"] = 1;
        $_SESSION["products"][$productId] = $arr;


        include __DIR__ . "/../view/basket.php";
    }

    public function deleteProduct(){
        $productId = $_GET["productId"];
       unset( $_SESSION["products"][$productId]);
        include __DIR__ . "/../view/basket.php";
    }

    public function buy (){
        $orderDao = new OrderDao();
        $userId = 1; //shte go vzimame ot sesiqta kato se lognem

        foreach ($_SESSION["products"] as $productId => $product){
            $order = new Order($product["quantity"],$userId,$productId);
            $orderDao->create($order);
        }
        unset( $_SESSION["products"]);
        include __DIR__ . "/../view/BoughtProducts.php";

        }

}