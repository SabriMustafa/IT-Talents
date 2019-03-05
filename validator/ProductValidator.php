<?php

namespace Validator;


use model\Product;

class ProductValidator
{
    public function validateEditProductData()
    {
        if (isset($_POST["id"]) &&
            isset($_POST["name"]) &&
            isset($_POST["price"]) &&
            isset($_POST["model"]) &&
            isset($_POST["quantity"]) &&
            isset($_POST["category"]) &&
            isset($_POST["brand"]) &&
            isset($_POST["spec-name"]) &&
            isset($_POST["spec-value"])) {
            return true;
        } else {
            return false;
        }


    }

    public function validateProduct()
    {
        if (isset($_POST["name"]) &&
            isset($_POST["price"]) &&
            isset($_POST["model"]) &&
            isset($_POST["quantity"]) &&
            isset($_POST["category"]) &&
            isset($_POST["brand"]) &&
            isset($_POST["spec-name"]) &&
            isset($_POST["spec-value"])) {
            return true;
        } else {
            return false;
        }
    }

    public function extractImages()
    {
        $txtGalleryName = "view/assets/images";
        $extension = array("jpeg", "jpg", "png", "gif");
        $images = [];
//        var_dump($_FILES);
        foreach ($_FILES["files"]["tmp_name"] as $key => $tmp_name) {
            $fileName = $_FILES["files"]["name"][$key];
            $ext = pathinfo($fileName, PATHINFO_EXTENSION);
            if (in_array($ext, $extension)) {
                $filename = basename($fileName, $ext);
                $newFileName = str_replace(" ", "", $filename) . time() . "." . $ext;
                $destination = $txtGalleryName . "/" . $newFileName;
                move_uploaded_file($fileTmp = $_FILES["files"]["tmp_name"][$key], __DIR__ . "/../" . $destination);
                $images[] = $destination;
            }
        }

        return $images;

    }

}