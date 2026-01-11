<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/admindashboard.css">
  <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/setting.css">

   <title>
         Admin Dashboard - AIUB Sports
          </title>

   <style>
 
   </style>
   </head>

<body>
     
       <div class="sidebar">
           <img src="/Project personal/MVC/Images/445492922_122100097214350632_1896056624552573141_n.jpg" alt="Admin">
              <a href="../Controller/AdminDashboardController.php">Dashboard</a>
                   <a href="../Controller/AdminUsersController.php">Manage Users</a>
                <a href="">Manage Events</a>
                  <a href="">Registrations</a>
                  <a href="">Manage Tasks</a>
                 <a href="../Controller/AdminSettingsController.php">Settings</a>
             <a href="/Project personal/MVC/Controller/logout.php">Logout</a>

</div>

<div class="top-navbar">
    <h5>Admin Dashboard</h5>
    <div>
        Welcome,
        <?php
        if(isset($_SESSION['username'])){
            echo $_SESSION['username'];
        }else{
            echo 'Admin';
        }
        ?>
    </div>
</div>
<style>


</style>
<div class="flex-column">
    <div class="card">
        <h5>Update Profile</h5>
        <form action="" method="POST">
            <label for="name">Full Name</label>
            <input type="text" id="name" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>

            <label for="role">Role</label>
            <input type="text" id="role" value="<?= htmlspecialchars($user['role']) ?>" disabled>

            <button type="submit" class="update-btn">Update Profile</button>
        </form>
    </div>

    <div class="card">
        <h5>Change Password</h5>
        <form action="" method="POST">
            <label for="currentPassword">Current Password</label>
            <input type="password" id="currentPassword" name="current_password" required>

            <label for="newPassword">New Password</label>
            <input type="password" id="newPassword" name="new_password" required>

            <label for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirm_password" required>

            <button type="submit" class="change-btn">Change Password</button>
        </form>
    </div>
</div>


    </body>
      </html>
