<?php
include_once('Product.php');
include_once('iProductAttributes.php');

class BookClass extends Product implements ProductAtrributes
{

    public function __construct($sku, $name, $price, $attribute)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->type = 'Book';
        $this->setPrice($price);
        $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute . 'KG';
    }
    function getAttribute()
    {
        return  $this->attribute;
    }
}
