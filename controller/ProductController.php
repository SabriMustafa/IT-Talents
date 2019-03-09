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
            $delImages = $productDao->getImagesById($_POST["id"]);
            $insImages = $validator->uploadImages();
            $product = new Product(trim($_POST["id"]),
                trim($_POST["name"]),
                trim($_POST["price"]),
                trim($_POST["model"]),
                trim($_POST["quantity"]),
                trim($_POST["category"]),
                trim($_POST["brand"]),
                trim($_POST["spec-name"]),
                trim($_POST["spec-value"]),
                null);
            $isUpdated = $productDao->updateProduct($product, $delImages, $insImages);

            if ($isUpdated) {
                foreach ($delImages as $image) {

                    unlink(__DIR__ . "/../" . $image['url']);
                }
            }
        }

        // header("location: /IT-Talents/index.php?target=admin&action=index");

    }

    public function insertSpecification()
    {
        if (isset($_POST["name"]) && $_POST["name"] != "" &&
            isset($_POST["id"]) && $_POST["id"] != "" &&
            isset($_POST["value"]) && $_POST["value"] != "") {
            $productDao = new ProductDao();
            $productDao->insertNewSpecification($_POST["id"], $_POST["name"], $_POST["value"]);

      }

        include __DIR__ . "/../view/adminUpdate.php";
    }

    public function insertProduct()
    {

        $validator = new ProductValidator();

        if ($validator->validateProduct()) {

            $images = $validator->uploadImages();
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

        } else {


        }
        header("location: /IT-Talents/index.php?target=admin&action=index");
    }

    public function getFilteredSubcategory()
    {

        $productDao = new ProductDao();
        $brand = null;
        $ascending = null;
        $descending = null;

        if (isset($_POST["subCategories"])) $subCategoryId = $_POST["subCategories"];
        if (isset($_POST["brands"])) $brand = $_POST["brands"];
        if (isset($_POST["asc"])) $ascending = $_POST["asc"];
        if (isset($_POST["desc"])) $descending = $_POST["desc"];

        $allProducts = $productDao->getFilteredProducts($subCategoryId, $brand, $ascending, $descending);
        $brands = $productDao->getAllBrands();
        $selected_brand = null;

        foreach ($allProducts as $key => $product) {
            $specification = $productDao->getProductSpecification($product["id"]);
            $allProducts[$key]["spec"] = $specification;

        }
        include __DIR__ . "/../view/products.php";

    }

    public function getSubcategory()
    {
        $subCategoryId = $_GET["subcategory"];
        $productDao = new ProductDao();
        $allProducts = $productDao->getProductsBySubID($subCategoryId);


        $brands = $productDao->getAllBrands();
        $selected_brand = null;

        foreach ($allProducts as $key => $product) {
            $specification = $productDao->getProductSpecification($product["id"]);

            $allProducts[$key]["spec"] = $specification;

        }


        include __DIR__ . "/../view/products.php";
    }


    public function getCharactersitics()
    {
        $productId = $_GET["productId"];
        $product = new ProductDao();

        $allCharacteristics = $product->getProductSpecification($productId);

        $productModell = $product->getProductById($productId);


        include __DIR__ . "/../view/characteristic.php";


    }
    public function getCategories()
    {
        $productDao = new ProductDao();
        $categories = $productDao->getAllCategories();
        $subCategories = $productDao->getAllSubCategories();
        foreach ($categories as $key => $category) {
            foreach ($subCategories as $subCategory) {
                if ($category["id"] == $subCategory["categories_id"]) {
                    $categories[$key]['subcategories'][] = ['id'=>$subCategory['id'], 'name' =>$subCategory['name']];
                }
            }

        }
        return $categories;

    }

    public function searchHome()
    {
        $name = $_GET["searchValue"];
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $count = 4;
        $from = $page === 1 ? 0 : ($page - 1) * $count;
        $product = new ProductDao();

        $allProducts = $product->filterHome($name, $from, $count);
        foreach ($allProducts as $key => $product1) {
            $specification = $product->getImgInFilterFunction($product1["id"]);
            $allProducts[$key]["spec"] = $specification;
        }

        $pages = ceil($product->countResults($name) / $count);
        include_once __DIR__ . "/../view/Home.php";
    }


}



