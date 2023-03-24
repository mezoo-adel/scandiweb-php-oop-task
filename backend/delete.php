<?php

include_once './DB/crudController.php';


if (isset($_REQUEST)) {
    # code...
    $arrayOfReq = $_REQUEST['deletedItems'];
    try {
        //code...
        $db = new DBController();
        foreach ($arrayOfReq as $sku) {
            # code...
            $db->deleteFromDB($sku);
        }
        header('Location:../');
        die();
    } catch (Exception $th) {
        //throw $th;
        var_dump("CATCHED ERRRORS,,  ",$th);
    }

    // throw new ErrorException($_GET['deleteItems']);
} else {
    setcookie('mass-delete', 'failed', 0, '/addproduct.html');
    header('Location:../');
    die();

}
