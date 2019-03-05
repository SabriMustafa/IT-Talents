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
    public function editProduct()
    {
        $validator = new ProductValidator();

        if ($validator->validateEditProductData()) {
            $productDao = new ProductDao();
            $images = $productDao->getImagesById($_POST["id"]);

            foreach ($images as $image) {
                unlink($image);
            }
            $images = $validator->extractImages();
            $product = new Product(trim($_POST["id"]),
                trim($_POST["name"]),
                trim($_POST["price"]),
                trim($_POST["model"]),
                trim($_POST["quantity"]),
                trim($_POST["category"]),
                trim($_POST["brand"]),
                trim($_POST["spec-name"]),
                trim($_POST["spec-value"]),
                $images);
            $productDao->updateProduct($product);
            header("location: /IT-Talents/index.php?target=admin&action=index");
        } else {
            header("location: /IT-Talents/index.php?target=admin&action=index");
        }


    }

    public function insertProduct()
    {
        //print_r($_FILES);
        $validator = new ProductValidator();

        if ($validator->validateProduct()) {
            $images = $validator->extractImages();
            $product = new Product(null,
                trim($_POST["name"]),
                trim($_POST["price"]),
                trim($_POST["model"]),
                trim($_POST["quantity"]),
                trim($_POST["category"]),
                trim($_POST["brand"]),
                trim($_POST["spec-name"]),
                trim($_POST["spec-value"]),
                $images
            );

            $productDao = new ProductDao();
            $productDao->addProduct($product);
            header("location: /IT-Talents/index.php?target=admin&action=index");
        } else {
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

    public function getCharactersitics()
    {
        $productId = $_GET["productId"];
        $product = new ProductDao();

        $allCharacteristics = $product->getProductSpecification($productId);

        $productModell = $product->getProductModel($productId);


        include __DIR__ . "/../view/characteristic.php";


    }

    public function searchHome()
    {

        $name = $_POST["searchValue"];
        $product = new ProductDao();

        $allProducts = $product->filterHome($name);
        foreach ($allProducts as $key => $product1) {
            $specification = $product->getImgInFilterFunction($product1["id"]);
            $allProducts[$key]["spec"] = $specification;
        }
        include_once __DIR__ . "/../view/Home.php";


    }


}



