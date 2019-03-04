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
        //print_r($_FILES);
        $validator = new ProductValidator();

        if($validator->validateProduct()){
            $images = $validator->extractImages();
            $product = new Product(null,
                $_POST["name"],
                $_POST["price"],
                $_POST["model"],
                $_POST["quantity"],
                $_POST["category"],
                $_POST["brand"],
                $images
            );

            $productDao = new ProductDao();
            $productDao->addProduct($product);
            header("location: /IT-Talents/index.php?target=admin&action=index");
        }else{
            header("location: /IT-Talents/index.php?target=admin&action=index");
        }
    }

    public function getSubcategory()
    {
        $id = $_GET["subcategory"];
        $products = new ProductDao();
        $allProducts = $products->getProductsBySubID($id);
        foreach ($allProducts as $key => $product) {
            $specification = $products->getProductSpecification($product["id"]);
            $allProducts[$key]["spec"] = $specification;
        }
        $productDao = new ProductDao();


        include __DIR__ . "/../view/products.php";
    }

    public function getCharactersitics(){
        $productId=$_GET["productId"];
        $product = new ProductDao();

        $allCharacteristics=$product->getProductSpecification($productId);

        $productModell = $product->getProductModel($productId);


        include __DIR__ . "/../view/characteristic.php";



    }

    public function searchHome(){

        $name = $_POST["searchValue"];
        $product = new ProductDao();

        $allProducts = $product->filterHome($name);
        foreach ($allProducts as $key => $product1) {
            $specification = $product->getImgInFilterFunction($product1["id"]);
            $allProducts[$key]["spec"] = $specification;
        }
        include_once __DIR__."/../view/Home.php";



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