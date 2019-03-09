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

    public function updateProduct(Product $product, $delImages, $insImages)
    {
        try {

            $stmtdb = $this->db;
            $stmtdb->beginTransaction();

            $sql = "UPDATE products SET   
                    name=?,
                    price=?,
                    model=?, 
                    quantity=?, 
                    sub_categories_id=?,
                     brand_id=?
                WHERE id=?";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute([$product->getName(),
                $product->getPrice(),
                $product->getModel(),
                $product->getQuantity(),
                $product->getSubCategoriesId(),
                $product->getBrandId(),
                $product->getId()]);

            $prodId = $product->getId();

            if($delImages && count($delImages) > 0){
                $deleteImages = [];
                foreach ($delImages as $img){
                    $deleteImages[] = $img["id"];
                }
                $ids = implode(',', $deleteImages);
                $deleteImagesSql = "DELETE FROM images WHERE id IN ($ids)";
                $stmtdb->exec($deleteImagesSql);
            }

            if($insImages && count($insImages) > 0){
                $insertImageSql = "INSERT INTO images (product_url,product_id) VALUE (?,?)";
                $pstmt = $stmtdb->prepare($insertImageSql);

                foreach ($insImages as $imgDestination){
                    $pstmt->execute([$imgDestination, $prodId]);
                }
            }

            $deleteSpecSql = "DELETE FROM product_specifications WHERE product_id=?";
            $pstmt = $this->db->prepare($deleteSpecSql);
            $pstmt->execute([$prodId]);

            $stmtdb->commit();
            return true;

        } catch (\Exception $e) {
            $stmtdb->rollBack();
            return false;
        }


    }

    public function insertNewSpecification($prodId, $specName, $specValue){
        $stmtdb = $this->db;
        $sql = "INSERT INTO product_specifications (name, value, product_id) VALUE (?,?,?)";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$specName, $specValue, $prodId]);
    }
    public function getImagesById($id)
    {
        $sql = "SELECT id, product_url FROM images WHERE product_id=? ";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $rows = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        $images = [];
        foreach ($rows as $row) {
            $images[] = ["id" => $row["id"], "url" => $row["product_url"]];
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

            $sql = "INSERT INTO product_specifications (  
                    name,
                    value,
                  product_id)
                VALUE (?,?,?)";
            $pstmt = $this->db->prepare($sql);
            $pstmt->execute([$product->getSpecName(),
                $product->getSpecValue(),
                $prodId]);


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

        $sql = "SELECT p.id, p.name as category,p.price,b.name,p.model  as model 
                FROM products as p
                join brands as b
                 on b.id = p.brand_id
               where sub_categories_id = ?";

        if (isset($_GET["brands"])) {
            if ($_GET["brands"] != "All") {
                $here = $_GET["brands"];
                $sql .= " and b.name = '$here' ";
            } elseif ($_GET["brands"] == "All") {
                $sql = "SELECT p.id, p.name as category,p.price ,b.name,p.model  as model 
                        FROM products as p
                        join brands as b
                         on b.id = p.brand_id
                        where sub_categories_id = ?";
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
                FROM product_specifications as p 
                inner join images as i
		         on p.product_id = i.product_id 
                where p.product_id = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getProductById($id)
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

    public function filterHome($name)
    {
        $sql = "SELECT p.id, p.name as category,p.price ,b.name,p.model  as model 
                FROM products as p
                join brands as b
                on b.id = p.brand_id
                where b.name = ?";

        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$name]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function getImgInFilterFunction($id)
    {

        $sql = "SELECT product_url FROM technomarket.images where product_id = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetch(\PDO::FETCH_ASSOC);
        return $result;
    }

    public function unsetProductQuantity($quantity, $id)
    {
        $sql = "UPDATE products
                SET quantity = quantity - ?
                WHERE id = ?";
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$quantity, $id]);
    }

    public function getFilteredProducts($id = null, $brand = null, $ascending = null, $descending = null)
    {

        $sql = "SELECT p.id, p.name as category,p.price,b.name,p.model  as model 
                FROM products as p
                join brands as b
                 on b.id = p.brand_id
               where sub_categories_id = ? ";

        if ($brand != null) {
            $sql .= " AND b.id=$brand ";

        }
        if ($ascending != null && $descending != null) {
            //nothing to do
        } else {
            if ($ascending != null) {
                $sql .= " ORDER BY p.price ASC";
            }
            if ($descending != null) {
                $sql .= " ORDER BY p.price DESC";

            }

        }
        $pstmt = $this->db->prepare($sql);
        $pstmt->execute([$id]);
        $result = $pstmt->fetchAll(\PDO::FETCH_ASSOC);
        return $result;


    }
}




