<?php

include_once 'classes/DvdClass.php';
include_once 'classes/BookClass.php';
include_once 'classes/FurnitureClass.php';
include_once './DB/crudController.php';
include_once 'Request.php';

//connect to database
$db = new DBController();
// make cookies of request to use it at front-end
$string = implode("_", array_values($_REQUEST));
$string = str_replace(" ", "-", $string);
setcookie('old', $string, 0, '/addproduct.html');
//validate request and check if sku is unique
Request::validated($_REQUEST);
$sku = $db->selectSkuFromDB($_REQUEST['sku']);
if ($sku) {
    # code...
    setcookie('validation', "Sku-already-existis-is-database", 0, '/addproduct.html');
    header("location:../addproduct.html");
    die();
}
// setcookie('old',$_POST['sku']$_POST['name']$_POST['price']$_POST['attribute'], 0, '/addproduct.html');
if (isset($_POST['submit'])) {
    # code...
    $product = new $_REQUEST['submit'](
        $_POST['sku'],
        $_POST['name'],
        $_POST['price'],
        $_POST['attribute']
    );
    $db->insertIntoDB($product->generateProductArray());
    header("location:../");
    die();
} else {
    throw new Exception("we couldn't initialite your product, maybe you entered an existing product");
}
// header('Location:https://scandiweb-mezoo-php-task.000webhostapp.com/');
// die();
