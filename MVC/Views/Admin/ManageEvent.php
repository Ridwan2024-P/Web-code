<!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/admindashboard.css">
    <title>Manage Events - Admin</title>
    <style>
        .action-btn{
          padding:6px 12px;
           margin:2px;
            border:none; 
            border-radius:6px;
             cursor:pointer;
            
            }

        .edit
        { 
          background:#0d6efd; 
          color:#fff;
        
        }
        .delete{
          background:#dc3545; 
          color:#fff;
        }
        .add-btn{
          padding:8px 15px; 
          background:#198754;
           color:#fff;
            border:none; 
           border-radius:6px;
            cursor:pointer;
             margin-bottom:15px;
            }

        .search-input{
          padding:6px; 
          border-radius:6px;
           border:1px solid #ccc;
            width:200px;
             margin-bottom:10px;}
        .form-popup{
          display:none; 
          background:#fff; 
          padding:20px;
           border-radius:12px; 
           margin-bottom:15px;
          }
    </style>
</head>
<body>

    <div class="sidebar">
           <img src="/Project personal/MVC/Images/445492922_122100097214350632_1896056624552573141_n.jpg" alt="Admin">
              <a href="../Controller/AdminDashboardController.php">Dashboard</a>
                   <a href="../Controller/AdminUsersController.php">Manage Users</a>
                <a href="../Controller/EventController.php">Manage Events</a>
                  <a href="../Controller/RegistrationController.php">Registrations</a>
                  <a href="">Manage Tasks</a>
                
                     <a href="../Controller/AdminSettingsController.php">Settings</a>
             <a href="/Project personal/MVC/Controller/logout.php">Logout</a>

</div>


<div class="top-navbar">
    <h5>Manage Events</h5>
    <div>Welcome, <?= $_SESSION['username'] ?? 'Admin' ?></div>
</div>

<div class="main-content">
    <button class="add-btn" onclick="showAddForm()">Add New Event</button>
    <input type="text" class="search-input" placeholder="Search events..." onkeyup="searchTable()">

    
    <div id="addForm" class="form-popup">
        <h4>Add Event</h4>
        <form method="POST">
            <label>Event Name:</label><br>
            <input type="text" name="name" required><br><br>
            <label>Date:</label><br>
            <input type="date" name="date" required><br><br>
            <label>Venue:</label><br>
            <input type="text" name="venue" required><br><br>
            <label>Participants:</label><br>
            <input type="number" name="participants" required><br><br>
            <button type="submit" name="add">Add Event</button>
            <button type="button" onclick="hideForms()">Cancel</button>
        </form>
    </div>

  
    <div id="editForm" class="form-popup">
        <h4>Edit Event</h4>
        <form method="POST">
            <input type="hidden" name="id" id="edit_id">
            <label>Event Name:</label><br>
            <input type="text" name="name" id="edit_name" required><br><br>
            <label>Date:</label><br>
            <input type="date" name="date" id="edit_date" required><br><br>
            <label>Venue:</label><br>
            <input type="text" name="venue" id="edit_venue" required><br><br>
            <label>Participants:</label><br>
            <input type="number" name="participants" id="edit_participants" required><br><br>
            <label>Status:</label><br>
            <select name="status" id="edit_status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                 <option value="Completed">Completed</option>
                  <option value="Cancelled">Cancelled</option>
            

            </select><br><br>
            <button type="submit" name="update">Update Event</button>
            <button type="button" onclick="hideForms()">Cancel</button>
        </form>
    </div>

    <div class="card">
        <table id="eventTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Venue</th>
                    <th>Participants</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if($events && $events->num_rows>0): ?>
                    <?php while($row = $events->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= htmlspecialchars($row['name']) ?></td>
                            <td><?= htmlspecialchars($row['date']) ?></td>
                            <td><?= htmlspecialchars($row['venue']) ?></td>
                            <td><?= htmlspecialchars($row['participants']) ?></td>
                            <td><span class="status <?= strtolower($row['status']) ?>"><?= htmlspecialchars($row['status']) ?></span></td>
                            <td>
                                <button class="action-btn edit" onclick="editEvent('<?= $row['id'] ?>', '<?= addslashes($row['name']) ?>', '<?= $row['date'] ?>', '<?= addslashes($row['venue']) ?>', '<?= $row['participants'] ?>', '<?= $row['status'] ?>')">Edit</button>
                                <form method="POST" style="display:inline-block;">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <button type="submit" name="delete" class="action-btn delete" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="7">No events found</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
function searchTable(){
  const input = document.querySelector(".search-input").value.toLowerCase();
  document.querySelectorAll("#eventTable tbody tr").forEach(row=>{
    row.style.display = row.innerText.toLowerCase().includes(input) ? "" : "none";
  });
}

function showAddForm(){
    document.getElementById('addForm').style.display='block';
    document.getElementById('editForm').style.display='none';
}
function hideForms(){
    document.getElementById('addForm').style.display='none';
    document.getElementById('editForm').style.display='none';
}

function editEvent(id,name,date,venue,participants,status){
    document.getElementById('editForm').style.display='block';
    document.getElementById('addForm').style.display='none';
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_name').value = name;
    document.getElementById('edit_date').value = date;
    document.getElementById('edit_venue').value = venue;
    document.getElementById('edit_participants').value = participants;
    document.getElementById('edit_status').value = status;
}
</script>

</body>
</html>
