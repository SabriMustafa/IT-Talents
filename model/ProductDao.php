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

    public function updateProduct(Product $product){
        try {

            $stmtdb = $this->db;
            $stmtdb->beginTransaction();

            $sql = "UPDATE products SET   
                    name,
                    price,
                    model, 
                    quantity, 
                    sub_categories_id,
                     brand_id
                VALUE (?,?,?,?,?,?) WHERE id=?";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute([$product->getName(),
                $product->getPrice(),
                $product->getModel(),
                $product->getQuantity(),
                $product->getSubCategoriesId(),
                $product->getBrandId(),
                $product->getId()]);
            $prodId = $this->db->lastInsertId();
            $images = $product->getImages();
            foreach ($images as $image) {
                $sql2 = "INSERT INTO images(product_url,product_id) VALUES (?,?)";
                $pstmt = $this->db->prepare($sql2);
                $pstmt->execute([$image, $prodId]);
            }


            $stmtdb->commit();
            return true;

        } catch (\Exception $e) {
            echo "Exception" . $e->getMessage() . PHP_EOL;
            $stmtdb->rollBack();
            return false;

        }


    }

    public function getImagesById($id)
    {
        $sql = "SELECT product_url FROM images WHERE product_id=? ";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $rows = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        $images = [];
        foreach ($rows as $row) {
            $images[] = $row["product_url"];
        }
        return $images;

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
            $prodId = $this->db->lastInsertId();
            $images = $product->getImages();
            foreach ($images as $image) {
                $sql2 = "INSERT INTO images(product_url,product_id) VALUES (?,?)";
                $pstmt = $this->db->prepare($sql2);
                $pstmt->execute([$image,$prodId]);
            }


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

    public function getAllCategories()
    {

        $sql = "SELECT id,name from categories";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }


    public function getAllSubCategories()
    {

        $sql = "SELECT id,name,categories_id from sub_categories";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute();
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getSubCategoriesById($id)
    {

        $sql = "SELECT id,name from sub_categories where categories_id=?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetch(\PDO::FETCH_ASSOC);

        return $result;

    }


    public function getProductsBySubID($id)
    {

        $sql = "SELECT p.id, p.name as category,p.price ,b.name,p.model  as model 
          FROM products as p
          join brands as b
            on b.id = p.brand_id
          where sub_categories_id = ?";

        if (isset($_GET["brands"])){
            if ($_GET["brands"] != "All"){
                $here = $_GET["brands"];
                $sql .= " and b.name = '$here' ";
            }
        }
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductSpecification($id)
    {
        $sql = "SELECT concat(p.name,' ', p.value) as performance ,i.product_url  as images 
            FROM product_specifications_value as p 
            inner join images as i
		     on p.product_id = i.product_id 
            where p.product_id = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getProductModel($id)
    {
        $sql = "SELECT  concat(p.name,' ',b.name,' ', p.model)  as model, p.price
              FROM products as p
              join brands as b
               on b.id = p.brand_id
              where  p.id = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function filterHome ($name){

        $sql="SELECT p.id, p.name as category,p.price ,b.name,p.model  as model 
          FROM products as p
          join brands as b
            on b.id = p.brand_id
          where b.name = ?";

        $pstmt =$this->db->prepare($sql);
        $pstmt->execute([$name]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

}




