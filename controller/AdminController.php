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
        // if (isset($_SESSION["user"]) && $_SESSION["user"]["is_admin"] == 1) {
        $productDao = new \model\ProductDao();
        $subCategories = $productDao->getAllSubCategories();

        $productDao = new \model\ProductDao();
        $brands = $productDao->getAllBrands();
        $selected_brand = null;
        $selected_category = null;
        include __DIR__ . '/../view/adminPage.php';
//        } else {
//            require_once __DIR__ .'/../view/'.'Login.html';
//        }

    }


}
