<?php
class EventModel {
    private $conn;

    public function __construct($dbConn) {
        $this->conn = $dbConn;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM events ORDER BY id DESC");
    }

    public function addEvent($name, $date, $venue, $participants) {
        $stmt = $this->conn->prepare("INSERT INTO events (name, date, venue, participants) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $name, $date, $venue, $participants);
        $stmt->execute();
        $stmt->close();
    }

    public function updateEvent($id, $name, $date, $venue, $participants, $status) {
        $stmt = $this->conn->prepare("UPDATE events SET name=?, date=?, venue=?, participants=?, status=? WHERE id=?");
        $stmt->bind_param("sssisi", $name, $date, $venue, $participants, $status, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function deleteEvent($id) {
        $stmt = $this->conn->prepare("DELETE FROM events WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
