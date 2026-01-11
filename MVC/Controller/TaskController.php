<?php
require_once __DIR__ . "/../../MVC/Model/DB.php";
require_once __DIR__ . "/../../MVC/Model/User.php";
require_once __DIR__ . "/../../MVC/Model/Task.php";
require_once __DIR__ . "/../../MVC/Model/Announcement.php";


$db   = new DataBase();
$conn = $db->connect();

class TaskController {
    public $volunteers;
    public $events;
    public $tasks;
    public $announcements;
    public $messages = [];

    private $userModel;
    private $taskModel;
    private $announcementModel;

    public function __construct($conn) {
        $this->userModel = new User($conn);
        $this->taskModel = new Task($conn);
        $this->announcementModel = new Announcement($conn);
    }

    public function loadData() {
        $this->volunteers    = $this->userModel->getVolunteers(); 
        $this->events        = $this->taskModel->getEvents();     
        $this->tasks         = $this->taskModel->getAllTasks();   
        $this->announcements = $this->announcementModel->getAllAnnouncements(); 
    }

    public function handlePost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (isset($_POST['add_task'])) {
                $volunteer_id = $_POST['volunteer_id'] ?? null;
                $event_name   = $_POST['event_name'] ?? null;
                $task_name    = $_POST['task_name'] ?? null;
                $task_date    = $_POST['task_date'] ?? null;

                if ($volunteer_id && $event_name && $task_name && $task_date) {
                    $success = $this->taskModel->addTask($volunteer_id, $event_name, $task_name, $task_date);
                    $this->messages[] = $success ? "Task added successfully." : "Failed to add task.";
                } else {
                    $this->messages[] = "Please fill all fields to add a task.";
                }
            }

            
            if (isset($_POST['add_announcement_submit'])) {
                $message = trim($_POST['add_announcement'] ?? '');
                $event_date = !empty($_POST['event_date']) ? $_POST['event_date'] : null;

                if ($message !== '') {
                    $success = $this->announcementModel->addAnnouncement($message, $event_date);
                    $this->messages[] = $success ? "Announcement added successfully." : "Failed to add announcement.";
                } else {
                    $this->messages[] = "Message cannot be empty!";
                }
            }
        }
    }

    public function show() {
        $this->loadData();
        $volunteers    = $this->volunteers;
        $events        = $this->events;
        $tasks         = $this->tasks;
        $announcements = $this->announcements;
        $messages      = $this->messages;
        include __DIR__ . "/../Views/Admin/admin_tasks_view.php";
    }
}

$controller = new TaskController($conn);
$controller->handlePost();
$controller->show();
?>
