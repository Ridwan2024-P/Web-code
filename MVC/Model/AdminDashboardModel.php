<?php
require_once __DIR__ . "/DB.php";

class AdminDashboardModel {
    private $conn;

    public function __construct() {
        $db = new DataBase();
        $this->conn = $db->connect();
    }

    public function totalUsers() {
        $res = $this->conn->query("SELECT COUNT(*) as total FROM users");
        return $res->fetch_assoc()['total'];
    }

    public function totalVolunteers() {
        $res = $this->conn->query("SELECT COUNT(*) as total FROM users WHERE role='volunteer'");
        return $res->fetch_assoc()['total'];
    }

    public function activeEvents() {
        $res = $this->conn->query("SELECT COUNT(*) as total FROM events WHERE status='Active'");
        return $res->fetch_assoc()['total'];
    }

    public function upcomingEvents() {
        return $this->conn->query(
            "SELECT * FROM events WHERE date >= CURDATE() ORDER BY date ASC LIMIT 5"
        );
    }
}
