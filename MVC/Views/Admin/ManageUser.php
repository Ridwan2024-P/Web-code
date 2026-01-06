<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/admindashboard.css">
  <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/adminuser.css">
<title>Admin Dashboard - AIUB Sports</title>

</head>
<body>
 <div class="sidebar">
           <img src="/Project personal/MVC/Images/445492922_122100097214350632_1896056624552573141_n.jpg" alt="Admin">
              <a href="">Dashboard</a>
                   <a href="">Manage Users</a>
                <a href="">Manage Events</a>
                  <a href="">Registrations</a>
                  <a href="">Manage Tasks</a>
                  <a href="">Reports</a>
                     <a href="">Settings</a>
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
    
    <div class="content-custom">
        <div style="display:flex; justify-content:right; align-items:center; margin-bottom:15px;">
            <input type="text" class="input-custom" placeholder="Search users...">
            <button class="button-custom button-primary">Add New User</button>
        </div>
  

        <div class="card-custom">
            <div style="overflow-x:auto;">
                <table class="table-custom table-hover-custom">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>john@example.com</td>
                            <td>Volunteer</td>
                            <td><span class="badge-custom badge-active">Active</span></td>
                            <td>
                                <button class="button-custom button-warning">Edit</button>
                                <button class="button-custom button-danger">Delete</button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>jane@example.com</td>
                            <td>User</td>
                            <td><span class="badge-custom badge-inactive">Inactive</span></td>
                            <td>
                                <button class="button-custom button-warning">Edit</button>
                                <button class="button-custom button-danger">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
