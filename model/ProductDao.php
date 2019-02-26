<?php

namespace model;
use PDO;

class ProductDao extends AbstractDao {


    public function getAllCategories(){
        $db = self::getDb();
        $sql = "SELECT 
        id,
        name
        FROM categories";
        $pstmt = $db->prepare($sql);
        $pstmt->execute();
        $allCategories = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $allCategories;

    }

    public function getSubCategoriesById($id){
        $db = self::getDb();
        $sql="SELECT * from sub_categories
              where categories_id = ?";
        $pstmt =$db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;

    }

}