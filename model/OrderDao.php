<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5.3.2019 г.
 * Time: 20:09
 */

namespace model;


class OrderDao {
    /**
     * @var PDO|null
     */
    private $db;

    public function __construct()
    {
        $this->db = AbstractDao::getDb();
    }

    public function create(Order $order) {
        try{
            $this->db->beginTransaction();
            $sql = "INSERT INTO orders(quantity,price,user_id,product_id) VALUES (?,?,?,?)";
            $this->db->prepare($sql)->execute([
                $order->getQuantity(),
                $order->getPrice(),
                $order->getUserId(),
                $order->getProductId()
                ]);
            $productDao = new ProductDao();
            $productDao->decreaseQuantity($order->getProductId(), $order->getQuantity());
            $this->db->commit();
            return true;

        }catch (\PDOException $e){
            echo "Exception" . $e->getMessage() . PHP_EOL;
            $this->db->rollBack();
            return false;
        }
    }
}