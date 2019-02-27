<?php
/**
 * Created by PhpStorm.
 * UserModel: dakata
 * Date: 2/26/2019
 * Time: 12:14 PM
 */

namespace controller;


class ProductController
{

    public function insertProduct()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {


            $name = $_REQUEST["name"];
            $price = $_REQUEST["price"];
            $model = $_REQUEST["model"];
            $quantity = $_REQUEST["quantity"];
            $subCategoriesId = $_REQUEST["category"];
            $brand_id = $_REQUEST["brand"];

            if ($name != ''
                && $price != ''
                && is_numeric($price) >= "5"
                && $model != ''
                && $quantity != ''
                && $subCategoriesId != ''
                && is_numeric($age)) {
                $user = new User($firstName, $lastName, $email, password_hash($password, PASSWORD_BCRYPT), $gendar, $age);
                $this->userDao->addUser($user);
                $_SESSION["user"] = $user;
            }
        }

    }


}