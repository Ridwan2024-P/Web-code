<?php
class Task {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }


  public function getEvents() {
    $sql = "SELECT id, name, date FROM events WHERE status='Active'";
    $result = $this->conn->query($sql);
    $events = [];
    while ($row = $result->fetch_assoc()) {
        $events[] = $row;
    }
    return $events;
}



 
    public function addTask($volunteer_id, $event_name, $task_name, $task_date) {
        $stmt = $this->conn->prepare("INSERT INTO volunteer_tasks (volunteer_id, event_name, task_name, task_date) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $volunteer_id, $event_name, $task_name, $task_date);
        return $stmt->execute();
    }

  
    public function getAllTasks() {
        $sql = "SELECT vt.*, u.username 
                FROM volunteer_tasks vt
                JOIN users u ON vt.volunteer_id = u.id
                ORDER BY vt.task_date DESC";
        return $this->conn->query($sql);
    }
}
?>
