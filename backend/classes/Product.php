<?php

abstract class Product
{
    public $sku;
    public $name;
    public $type;
    protected $attribute;
    private $price;

    public function setPrice(int $price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function generateProductArray()
    {
        return [
            $this->sku,  $this->name, $this->price, $this->type, $this->attribute,
        ];
    }
}
