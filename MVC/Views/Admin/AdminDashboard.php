<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/admindashboard.css">

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
                <a href="../Controller/EventController.php">Manage Events</a>
                  <a href="../Controller/RegistrationController.php">Registrations</a>
                  <a href="../Controller/TaskController.php">Manage Tasks</a>
                
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

<div class="main-content">
    <div class="card-row">
        <div class="card">
            <h5>Total Users</h5>
             <p><?php echo $totalUsers; ?></p>
        </div>

       
   <div class="card">
       <h5>Total Volunteers</h5>
        <p><?php echo $totalVolunteers; ?></p>
     </div>

      
     <div class="card">
         <h5>Active Events</h5>
          <p><?php echo $activeEvents; ?></p>
        </div>

    </div>

    <div class="table-box">
        <h5 style="margin-bottom:15px;">Upcoming Events</h5>

          <table>
                <thead>
                   <tr>
                       <th>Event Name</th>
                       <th>Date</th>
                       <th>Venue</th>
                       <th>Participants</th>
                       <th>Status</th>
                        </tr>
                     </thead>
                   <tbody>
                     
                <?php if($upcomingEvents && $upcomingEvents->num_rows > 0): ?>
                    <?php while($row = $upcomingEvents->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['date']); ?></td>
                            <td><?php echo htmlspecialchars($row['venue']); ?></td>
                            <td><?php echo htmlspecialchars($row['participants']); ?></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align:center;">No Upcoming Events</td>
                    </tr>
                <?php endif; ?>
          
            </tbody>
        </table>
   
       </div>
         </div>
    </body>
      </html>
