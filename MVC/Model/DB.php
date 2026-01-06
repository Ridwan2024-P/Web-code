<?php
class DataBase {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db   = "rid";
 
    public function connect() {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($conn->connect_error) {
            die("Database Connection Failed");
        }
        return $conn;
    }
}