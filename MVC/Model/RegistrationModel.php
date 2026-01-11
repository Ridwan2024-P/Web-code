<?php
class RegistrationModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $sql = "SELECT r.id,
                       u.username AS student_name,
                       u.email,
                       r.event_name,
                       r.registration_date,
                       r.status
                FROM registrations r
                JOIN users u ON u.id = r.user_id
                ORDER BY r.id DESC";

        return $this->conn->query($sql);
    }

    public function updateStatus($id, $status) {
        $stmt = $this->conn->prepare(
            "UPDATE registrations SET status=? WHERE id=?"
        );
        $stmt->bind_param("si", $status, $id);
        return $stmt->execute();
    }
}
