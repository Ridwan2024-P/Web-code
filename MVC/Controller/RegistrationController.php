<?php
session_start();

require_once __DIR__ . "/../../MVC/Model/DB.php";
require_once __DIR__ . "/../../MVC/Model/RegistrationModel.php";

$db   = new DataBase();
$conn = $db->connect();

class RegistrationController {

    private $model;

    public function __construct($dbConn) {
        $this->model = new RegistrationModel($dbConn);
    }

 
    public function show() {
        $registrations = $this->model->getAll();
        include __DIR__ . "/../views/admin/RegistrationDashboard.php";
    }

   
    public function handlePost() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['action'])) {
            $id = (int)$_POST['id'];
            $action = $_POST['action'];

            $status = ($action === 'approve') ? 'Approved' : 'Rejected';
            $this->model->updateStatus($id, $status);

           
            header("Location: " . $_SERVER['PHP_SELF']);
            exit;
        }
    }
}



$_SESSION['role'] = 'admin';
$_SESSION['username'] = 'Admin';

$controller = new RegistrationController($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->handlePost(); 
} else {
    $controller->show();      
}
