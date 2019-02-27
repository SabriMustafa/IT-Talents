<?php

namespace model;

class ProductModel
{

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


}