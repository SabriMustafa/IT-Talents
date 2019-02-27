<?php
namespace model;



class Product extends JsonObject {
    private $id;
    private $name;
    private $price;
    private $model;
    private $quantity;
    private $sub_categories_id;
    private $brand_id;
    private $firstImg;
    private $secondImg;
    private $thirdImg;
    private $fourthImg;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param $model
     * @param $quantity
     * @param $sub_categories_id
     * @param $brand_id
     * @param $firstImg
     * @param $secondImg
     * @param $thirdImg
     * @param $fourthImg
     */
    public function __construct($id, $name, $price, $model, $quantity, $sub_categories_id, $brand_id,
                                $firstImg, $secondImg=null, $thirdImg=null, $fourthImg=null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->model = $model;
        $this->quantity = $quantity;
        $this->sub_categories_id = $sub_categories_id;
        $this->brand_id = $brand_id;
        $this->firstImg = $firstImg;
        $this->secondImg = $secondImg;
        $this->thirdImg = $thirdImg;
        $this->fourthImg = $fourthImg;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
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
    public function getSubCategoriesId()
    {
        return $this->sub_categories_id;
    }

    /**
     * @return mixed
     */
    public function getBrandId()
    {
        return $this->brand_id;
    }

    /**
     * @return mixed
     */
    public function getFirstImg()
    {
        return $this->firstImg;
    }

    /**
     * @return null
     */
    public function getSecondImg()
    {
        return $this->secondImg;
    }

    /**
     * @return null
     */
    public function getThirdImg()
    {
        return $this->thirdImg;
    }

    /**
     * @return null
     */
    public function getFourthImg()
    {
        return $this->fourthImg;
    }


}