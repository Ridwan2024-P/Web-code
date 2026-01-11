<?php
class Announcement {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    
    public function addAnnouncement($message, $event_date = null) {
        if ($event_date === null || $event_date === '') {
            $stmt = $this->conn->prepare("INSERT INTO announcements (message) VALUES (?)");
            $stmt->bind_param("s", $message);
        } else {
            $stmt = $this->conn->prepare("INSERT INTO announcements (message, event_date) VALUES (?, ?)");
            $stmt->bind_param("ss", $message, $event_date);
        }

        if (!$stmt) {
            die("Prepare failed: " . $this->conn->error);
        }

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    
    public function getAllAnnouncements() {
        $result = $this->conn->query("SELECT * FROM announcements ORDER BY id DESC");
        $announcements = [];
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $announcements[] = $row;
            }
        }
        return $announcements;
    }
}
?>
