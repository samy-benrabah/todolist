<?php

class Database
{
    private $_localhost = "localhost";
    private $_dbname = "todolist";
    private $_username = "root";
    private $_password ="";
    protected $pdo;

    public function __construct(){
       
        try {
            $this->pdo = new PDO('mysql:host='.$this->_localhost.';dbname='.$this->_dbname.'', $this->_username, $this->_password); 
           
        } catch (PDOException $Exception) {
            
            throw new MyDatabaseException($Exception->getMessage(), (int) $Exception->getCode());
        }
        
        
    
    }

    public function __destruct(){
        $this->pdo;
    }
}

?>