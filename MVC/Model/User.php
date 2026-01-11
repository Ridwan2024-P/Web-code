<?php
class User {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

   
    public function getVolunteers() {
        $sql = "SELECT id, username FROM users WHERE role='volunteer' AND status=1";
        return $this->conn->query($sql);
    }
}
?>
