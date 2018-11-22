<?php

class Database{
    private $connection;
    
    public function __construct(){
        try{
            $this->connection = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USERNAME,DB_PASSWORD,
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));   
        }
        catch(PDOException $e)
        {
            // $e->getMessage();
        }
    }
    
    public function connect()
    {
        return $this->connection;
    }

}

class Model
{
    protected $conn;
    
    public function __construct()
    {
        $connection = new Database();
        $this->conn = $connection->connect();   
    }
}

