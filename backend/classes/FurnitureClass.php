<?php
include_once('Product.php');
include_once('iProductAttributes.php');

class FurnitureClass extends Product implements ProductAtrributes
{

    public function __construct($sku, $name, $price, $attribute)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->type = 'Furniture';
        $this->setPrice($price);
        $this->setAttribute($attribute);
    }

    public function setAttribute($attribute)
    {
        $this->attribute = $attribute[0] . 'x' . $attribute[1] . 'x' . $attribute[2];
    }
    function getAttribute()
    {
        return  $this->attribute;
    }
}
