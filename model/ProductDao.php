<?php

namespace model;

class ProductDao
{
    /**
     * @var PDO|null
     */
    private $db;

    public function __construct()
    {
        $this->db = AbstractDao::getDb();
    }

    public function addProduct(Product $product)
    {

        try {

            $stmtdb = $this->db;
            $stmtdb->beginTransaction();


            $sql = "INSERT INTO products (  
                    name,
                    price,
                    model, 
                    quantity, 
                    sub_categories_id,
                     brand_id)
                VALUE (?,?,?,?,?,?)";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute([$product->getName(),
                $product->getPrice(),
                $product->getModel(),
                $product->getQuantity(),
                $product->getSubCategoriesId(),
                $product->getBrandId()]);


            $sql2 = "INSERT INTO images(first_url,product_id,second_url,third_url,fourth_url) VALUES (?,?,?,?,?)";
            $pstmt = $this->db->prepare($sql2);
            $pstmt->execute([$product->getFirstImg(),
                $this->db->lastInsertId(),
                $product->getSecondImg(),
                $product->getThirdImg(),
                $product->getFourthImg()]);


            $stmtdb->commit();
            return true;

        } catch (\Exception $e) {
            echo "Exception" . $e->getMessage() . PHP_EOL;
            $stmtdb->rollBack();
            return false;

        }

    }

    public function getAllBrands()
    {

        $sql = "SELECT id,name FROM brands";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;


    }

    public function getAllCategories(){

        $sql="SELECT id,name from categories";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


    public function getAllSubCategories(){

        $sql="SELECT id,name,categories_id from sub_categories";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getSubCategoriesById($id){

        $sql="SELECT id,name from sub_categories where categories_id=?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetch(\PDO::FETCH_ASSOC);

        return $result;

    }


    public function getProductsBySubID($id){
        $db = self::getDb();
        $sql="SELECT p.id, p.name as category,p.price , concat(b.name,' ', p.model)  as model 
          FROM products as p
          join brands as b
            on b.id = p.brand_id
          where sub_categories_id = ?";
        $pstmt =$db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }


}




