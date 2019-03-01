<?php
namespace Validator;



class ProductValidator{


        public function validateProduct(array $data){
            if ($data["name"!=""] && $data["price"!=""] && is_numeric($data["price"]) &&
                $data["model"!=""] && $data["quantity"!=""] &&
                $data["category"!=""] && $data["brand"!=""] ){

            $_FILES["image"]["tmp_name"];
            foreach ( $_FILES["image"]["tmp_name"] as $key=>$tmp_name){
                if (is_uploaded_file($tmp_name)){
                    $file_name = time() . ".png";
                    if (move_uploaded_file($tmp_name, "../pictures/$file_name")) {
                        $image ="../pictures/$file_name";
                    }
                }

            }
            return true;

            }else{

                return false;

            }


        }






}