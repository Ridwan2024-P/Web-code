<?php
session_start();
require_once __DIR__ . "/../Model/AdminSettingsModel.php";

if(!isset($_SESSION['username']) || !isset($_SESSION['user_id'])){
 
    $_SESSION['username'] = "Admin";
    $_SESSION['user_id'] = 1; 
}

$model = new AdminSettingsModel();
$user = $model->getUser($_SESSION['user_id']);


if(isset($_POST['username'], $_POST['email'])){
    $model->updateProfile($_SESSION['user_id'], $_POST['username'], $_POST['email']);
    $user = $model->getUser($_SESSION['user_id']);
    $message = "Profile updated successfully.";
}


if(isset($_POST['current_password'], $_POST['new_password'], $_POST['confirm_password'])){
    if($_POST['new_password'] !== $_POST['confirm_password']){
        $error = "New password and confirm password do not match.";
    } elseif(!$model->verifyPassword($_SESSION['user_id'], $_POST['current_password'])){
        $error = "Current password is incorrect.";
    } else {
        $model->changePassword($_SESSION['user_id'], $_POST['new_password']);
        $success = "Password changed successfully.";
    }
}


require_once __DIR__ . "/../Views/Admin/Setting.php";

