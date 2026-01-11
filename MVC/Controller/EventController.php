<?php
session_start();

require_once __DIR__ . "/../../MVC/Model/DB.php";
require_once __DIR__ . "/../../MVC/Model/EventModel.php";

$db = new DataBase();
$conn = $db->connect();

$model = new EventModel($conn);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add'])) {
        $model->addEvent($_POST['name'], $_POST['date'], $_POST['venue'], $_POST['participants']);
    }
     if (isset($_POST['update'])) {
        $model->updateEvent(
            $_POST['id'],
            $_POST['name'],
            $_POST['date'],
            $_POST['venue'],
            $_POST['participants'],
            $_POST['status']
        );
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
    if (isset($_POST['edit'])) {
        $model->updateEvent($_POST['id'], $_POST['name'], $_POST['date'], $_POST['venue'], $_POST['participants'], $_POST['status']);
    }
    if (isset($_POST['delete'])) {
        $model->deleteEvent($_POST['id']);
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}



$events = $model->getAll();
include __DIR__ . "/../views/admin/ManageEvent.php";

