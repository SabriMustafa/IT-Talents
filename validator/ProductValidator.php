<?php
namespace Validator;



class ProductValidator{


        public function validateProduct(array $data){
            if ($data["name"!=""] && $data["price"!=""] && is_numeric($data["price"]) &&
                $data["model"!=""] && $data["quantity"!=""] &&
                $data["category"!=""] && $data["brand"!=""] ){

$txtGalleryName=__DIR__."/../pictures";

                extract($_POST);
                $error=array();
                $extension=array("jpeg","jpg","png","gif");
                foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
                {
                    $fileName=$_FILES["files"]["name"][$key];
                    $fileTmp=$_FILES["files"]["tmp_name"][$key];
                    $ext=pathinfo($fileName,PATHINFO_EXTENSION);
                    if(in_array($ext,$extension))
                    {
                        if(!file_exists($txtGalleryName."/".$fileName))
                        {
                            move_uploaded_file($fileTmp=$_FILES["files"]["tmp_name"][$key],$txtGalleryName."/".$fileName);
                        }
                        else
                        {
                            $filename=basename($fileName,$ext);
                            $newFileName=$filename.time().".".$ext;
                            move_uploaded_file($fileTmp=$_FILES["files"]["tmp_name"][$key],$txtGalleryName."/".$newFileName);
                        }
                    }
                    else
                    {
                        array_push($error,"$fileName, ");
                    }
                }
//
//            $_FILES["image"]["tmp_name"];
//            foreach ( $_FILES["image"]["tmp_name"] as $key=>$tmp_name){
//                if (is_uploaded_file($tmp_name)){
//                    $file_name = time() . ".png";
//                    if (move_uploaded_file($tmp_name, "../pictures/$file_name")) {
//                        $image ="../pictures/$file_name";
//                    }
//                }
//
//            }
            return true;

            }else{

                return false;

            }


        }






}