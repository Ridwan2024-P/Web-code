<?php
require_once "DB.php";

class AdminSettingsModel {
    private $conn;

    public function __construct() {
        $db = new DataBase();
        $this->conn = $db->connect();
    }

   
    public function getUser($id){
        $id = intval($id);
        $sql = "SELECT * FROM users WHERE id=$id LIMIT 1";
        $result = $this->conn->query($sql);
        if($result && $result->num_rows > 0){
            return $result->fetch_assoc();
        }
        return null;
    }

    public function updateProfile($id, $username, $email){
        $username = $this->conn->real_escape_string($username);
        $email = $this->conn->real_escape_string($email);
        $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function changePassword($id, $newPassword){
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$hashed' WHERE id=$id";
        return $this->conn->query($sql);
    }

  
    public function verifyPassword($id, $currentPassword){
        $user = $this->getUser($id);
        if($user){
            return password_verify($currentPassword, $user['password']);
        }
        return false;
    }
}
