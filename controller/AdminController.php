<?php
/**
 * Created by PhpStorm.
 * User: dakata
 * Date: 3/1/2019
 * Time: 8:59 PM
 */

namespace controller;


class AdminController
{
    public function index()
    {
        $isAdmin = $_SESSION["user"]->getIsAdmin();

         if (isset($_SESSION["user"]) && $isAdmin == 1) {

        $productDao = new \model\ProductDao();
        $subCategories = $productDao->getAllSubCategories();

        $productDao = new \model\ProductDao();
        $brands = $productDao->getAllBrands();
        $selected_brand = null;
        $selected_category = null;
        include __DIR__ . "/../view/adminInsert.php";
    } else {
      require_once __DIR__ . '/../view/login.php';
    }

    }

    public function update()
    {
        $isAdmin = $_SESSION["user"]->getIsAdmin();

        if (isset($_SESSION["user"]) && $isAdmin == 1) {
            $productId = null;
            if (isset($_POST["productId"])) {
                $productId = $_POST["productId"];
            }

            $productDao = new \model\ProductDao();
            $subCategories = $productDao->getAllSubCategories();

            $productDao = new \model\ProductDao();
            $brands = $productDao->getAllBrands();
            $selected_brand = null;
            $selected_category = null;
            include __DIR__ . "/../view/adminUpdate.php";
        } else {
            require_once __DIR__ . '/../view/login.php';
        }

    }


}
