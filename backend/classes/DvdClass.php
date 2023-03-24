<?php
include_once('Product.php');
include_once('iProductAttributes.php');

class DvdClass extends Product implements ProductAtrributes
{

    public function __construct($sku, $name, $price, $attribute)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->type = 'Dvd';
        $this->setPrice($price);
        $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute . ' MB';
    }
    function getAttribute()
    {
        return  $this->attribute;
    }
}
