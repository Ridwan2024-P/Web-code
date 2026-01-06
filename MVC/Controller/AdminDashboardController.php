<?php
session_start();  

require_once __DIR__ . "/../Model/AdminDashboardModel.php";

if(!isset($_SESSION['username'])){
    $_SESSION['username'] = "Admin";
}

$model = new AdminDashboardModel();

$totalUsers      = $model->totalUsers();
$totalVolunteers = $model->totalVolunteers();
$activeEvents    = $model->activeEvents();
$upcomingEvents  = $model->upcomingEvents();

require_once __DIR__ . "/../Views/Admin/AdminDashboard.php";
