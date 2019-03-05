<?php
namespace model;



class Product extends JsonObject {
    private $id;
    private $name;
    private $price;
    private $model;
    private $quantity;
    private $subCategoriesId;
    private $brand_id;
    private $specName;
    private $specValue;
    private $images;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param $model
     * @param $quantity
     * @param $subCategoriesId
     * @param $brand_id
     * @param $images array
     */
    public function __construct($id, $name, $price, $model, $quantity, $subCategoriesId,
                                $brand_id,$specName,$specValue ,$images)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->model = $model;
        $this->quantity = $quantity;
        $this->subCategoriesId = $subCategoriesId;
        $this->brand_id = $brand_id;
        $this->specName=$specName;
        $this->specValue=$specValue;
        $this->images = $images;
    }

    /**
     * @return mixed
     */
    public function getSpecName()
    {
        return $this->specName;
    }

    /**
     * @return mixed
     */
    public function getSpecValue()
    {
        return $this->specValue;
    }

    /**
     * @param mixed $specName
     */
    public function setSpecName($specName): void
    {
        $this->specName = $specName;
    }

    /**
     * @param mixed $specValue
     */
    public function setSpecValue($specValue): void
    {
        $this->specValue = $specValue;
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
     * @param mixed $subCategoriesId
     */
    public function setSubCategoriesId($subCategoriesId): void
    {
        $this->subCategoriesId = $subCategoriesId;
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
        return $this->subCategoriesId;
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



}