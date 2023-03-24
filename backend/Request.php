<?php
class Request
{
    public static function validated(array $request)
    {

        foreach ($request as $k => $v) {
            // loop on attributes if it's an array
            if (is_array($v)) {
                foreach ($v as $k => $a) {
                    if ($k == 0) {
                        $d = "Height";
                    } else {
                        $d = "WidthOrLength";
                    }
                    if ($a == null) {
                        setcookie('validation', "$d-is-an-empty-field", 0, '/addproduct.html');
                        header("location:../addproduct.html");
                        die();
                    }
                }
                // checks if values are empty
            } else {
                if ($v == null) {
                    # code...
                    setcookie('validation', "$k-is-an-empty-field", 0, '/addproduct.html');
                    header("location:../addproduct.html");
                    die();
                }
            }

        }
        // check if price not a number more than 0
        $price = intval(($request['price']));
        if ($price <= 0) {
            setcookie('validation', "price-should-contains-valid-data", 0, '/addproduct.html');
            header("location:../addproduct.html");
            die();
        }

    }

}
