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
    private $images;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param $model
     * @param $quantity
     * @param $sub_categories_id
     * @param $brand_id
     * @param $images array
     */
    public function __construct($id, $name, $price, $model, $quantity, $sub_categories_id, $brand_id, $images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->model = $model;
        $this->quantity = $quantity;
        $this->sub_categories_id = $sub_categories_id;
        $this->brand_id = $brand_id;
        $this->images = $images;
    }


    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;

    }
    public function setName($name){

    }

    /**
     * @return array
     */
    public function getImages(): array
    {
        return $this->images;
    }

    /**
     * @param array $images
     */
    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @param mixed $sub_categories_id
     */
    public function setSubCategoriesId($sub_categories_id): void
    {
        $this->sub_categories_id = $sub_categories_id;
    }

    /**
     * @param mixed $brand_id
     */
    public function setBrandId($brand_id): void
    {
        $this->brand_id = $brand_id;
    }

    /**
     * @param mixed $firstImg
     */
    public function setFirstImg($firstImg): void
    {
        $this->firstImg = $firstImg;
    }

    /**
     * @param null $secondImg
     */
    public function setSecondImg($secondImg): void
    {
        $this->secondImg = $secondImg;
    }

    /**
     * @param null $thirdImg
     */
    public function setThirdImg($thirdImg): void
    {
        $this->thirdImg = $thirdImg;
    }

    /**
     * @param null $fourthImg
     */
    public function setFourthImg($fourthImg): void
    {
        $this->fourthImg = $fourthImg;
    }

    /**
     * @return mixed
     *
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