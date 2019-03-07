<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5.3.2019 г.
 * Time: 20:09
 */

namespace model;


class Order extends JsonObject
{
    private $id;
    private $date;
    private $quantity;
    private $user_id;
    private $product_id;
    private $price;

    /**
     * Order constructor.
     * @param $id
     * @param $date
     * @param $quantity
     * @param $user_id
     * @param $product_id
     */
    public function __construct($quantity, $price, $user_id, $product_id)
    {
        $this->quantity = $quantity;
        $this->user_id = $user_id;
        $this->product_id = $product_id;
        $this->price=$price;

    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }
}