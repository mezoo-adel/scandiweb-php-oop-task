<?php


// any database will use this function to connect to it
abstract class ConnectToDatabase
{
    protected $host;
    protected $name;
    protected $pass;
    protected function connectToDb()
    {
        try {
            $connct = new PDO($this->host, $this->name, $this->pass);
            $connct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connct->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $connct;
        } catch (Exception $ex) {
            echo $ex;
        }
    }
}
