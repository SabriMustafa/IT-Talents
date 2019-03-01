<?php
/**
 * Created by PhpStorm.
 * UserModel: dakata
 * Date: 2/26/2019
 * Time: 12:14 PM
 */

namespace controller;


use model\Product;
use model\ProductDao;
use Validator\ProductValidator;

class ProductController
{

    public function insertProduct()
    {
        $validator = new ProductValidator();
        if (!$validator->validateProduct($_POST)) {
            return false;
        }
        $product = new Product();
        $product->getName($_POST["name"]);
        $product->getPrice($_POST["price"]);
        $product->getModel($_POST["model"]);
        $product->getSubCategoriesId($_POST["categoties"]);
        $product->getBrandId($_POST["brand"]);
        $product->getFourthImg($_POST["first-image"]);
        $product->getSecondImg($_POST["second-image"]);
        $product->getThirdImg($_POST["third-image"]);
        $product->getFourthImg($_POST["fourth-image"]);

        $productDao = new ProductDao();
        $productDao->addProduct($product);
        return true;
    }

    public function getSubcategory(){
        $id = $_GET["subcategory"];
        $products = new ProductDao();
        $allProducts = $products->getProductsBySubID($id);
        var_dump($allProducts);
        include __DIR__."/../view/products.php";
    }


}



//$name = $_REQUEST["name"];
//$price = $_REQUEST["price"];
//$model = $_REQUEST["model"];
//$quantity = $_REQUEST["quantity"];
//$subCategoriesId = $_REQUEST["category"];
//$brand_id = $_REQUEST["brand"];
//
//if ($name != ''
//    && $price != ''
//    && is_numeric($price) >= "5"
//    && $model != ''
//    && $quantity != ''
//    && $subCategoriesId != ''
//    && is_numeric($age)) {
//    $user = new User($firstName, $lastName, $email, password_hash($password, PASSWORD_BCRYPT), $gendar, $age);
//    $this->userDao->addUser($user);
//    $_SESSION["user"] = $user;
//}