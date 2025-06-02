<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '1234';
    private $dbname = 'sistema_login';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }
}