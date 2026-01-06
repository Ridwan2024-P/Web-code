<?php
require_once __DIR__ . "/DB.php";

class AdminUsersModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function getAllUsers() {
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $result = $this->conn->query($sql);
        $users = [];
        if($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $users[] = $row;
            }
        }
        return $users;
    }
    public function deleteUser($id){
    $id = intval($id);
    $sql = "DELETE FROM users WHERE id = $id";
    $this->conn->query($sql);
}
public function getUserById($id){
    $id = intval($id);
    $sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
    $result = $this->conn->query($sql);
    if($result && $result->num_rows > 0){
        return $result->fetch_assoc();
    }
    return null;
}

public function updateUser($id, $username, $email, $role, $status){
    $id = intval($id);
    $status = intval($status);
    $username = $this->conn->real_escape_string($username);
    $email = $this->conn->real_escape_string($email);
    $role = $this->conn->real_escape_string($role);

    $sql = "UPDATE users SET username='$username', email='$email', role='$role', status=$status WHERE id=$id";
    $this->conn->query($sql);
}

}
