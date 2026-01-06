<?php
session_start();
require_once __DIR__ . "/../Model/AdminUsersModel.php";

if(!isset($_SESSION['username'])){
    $_SESSION['username'] = "Admin";
}

$model = new AdminUsersModel();


if(isset($_GET['delete_id'])){
    $model->deleteUser($_GET['delete_id']);
    header("Location: /Project personal/MVC/Controller/AdminUsersController.php");
    exit;
}

if(isset($_POST['update_user'])){
    $model->updateUser($_POST['id'], $_POST['username'], $_POST['email'], $_POST['role'], $_POST['status']);
    header("Location: /Project personal/MVC/Controller/AdminUsersController.php");
    exit;
}


$editUser = null;
if(isset($_GET['edit_id'])){
    $editUser = $model->getUserById($_GET['edit_id']);
}


$users = $model->getAllUsers();



require_once __DIR__ . "/../Views/Admin/ManageUser.php";
