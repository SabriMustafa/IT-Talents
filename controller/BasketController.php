<?php

namespace controller;

use model\Order;
use model\OrderDao;
use model\ProductDao;
use model\UserDao;

class BasketController
{

    public function addProduct()
    {
        $productDao = new ProductDao();
        $productId = $_GET["productId"];

        $product = $productDao->getProductById($productId);
        $allCharacteristics = $productDao->getProductSpecification($productId);
        $productImages=$productDao->getProductImages($productId);

        $arr["image"]=$productImages[0];
        $arr["model"] = $product["model"];
        $arr["price"] = $product["price"];
        $arr["quantity"] = 1;
        $_SESSION["products"][$productId] = $arr;


        include __DIR__ . "/../view/basket.php";
    }

    public function deleteProduct()
    {
        $productId = $_GET["productId"];
        unset($_SESSION["products"][$productId]);
        include __DIR__ . "/../view/basket.php";
    }

    public function buy()
    {
        if (! isset($_SESSION["user"])) {
            include __DIR__ . "/../view/BoughtProducts.php";
            return;
        }
        $orderDao = new OrderDao();
        $userId = $_SESSION["user"]->getId();
        $spentMoney = 0;
        foreach ($_SESSION["products"] as $productId => $product) {
            $order = new Order($product["quantity"], $product['price'], $userId, $productId);
            $orderDao->create($order);
            $spentMoney += $product['price'];
        }
        $userDao = new UserDao();
        $userDao->totalSum($spentMoney,$userId);

        unset($_SESSION["products"]);
        include __DIR__ . "/../view/BoughtProducts.php";

    }
    public function basketView(){
        include __DIR__ . "/../view/basket.php";
    }


}