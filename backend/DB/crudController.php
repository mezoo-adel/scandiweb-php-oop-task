<?php

require_once('connectModel.php');

class DBController extends ConnectToDatabase
{
    function startConnection()
    {
        $this->host = 'mysql:host=localhost;dbname=scandiweb';
        $this->name = 'root';
        $this->pass = '';
        return $this->connectToDb();
    }

    public function insertIntoDB($array)
    {
        $sql = "INSERT INTO PRODUCTS (sku,name,price,type,attribute) VALUES (?,?,?,?,?);";
        // var_dump($this->startConnection());
        $insert = $this->startConnection()->prepare($sql);
        $insert->execute($array);
        return  $insert;
    }
    public function selectSkuFromDB($sku)
    {
        $sql = "SELECT sku FROM PRODUCTS WHERE sku = ? ;";
        
        $select = $this->startConnection()->prepare($sql);
        $select->bindParam(1,$sku);
        $select->execute();
        return $select->fetchAll();
    }
    public function selectFromDB()
    {
        $sql = "SELECT * FROM PRODUCTS;";
        $select = $this->startConnection()->prepare($sql);
        $select->execute();
        return $select->fetchAll();
    }
    public function deleteFromDB($sku)
    {
        $sql = "DELETE FROM PRODUCTS WHERE sku = ? ;";
        $select = $this->startConnection()->prepare($sql);
        $select->bindParam(1,$sku);
        return  $select->execute();
    }
}
