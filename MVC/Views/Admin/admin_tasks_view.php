
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="/Project personal/MVC/Views/CSS/admindashboard.css">
<title>Admin - Manage Tasks</title>

<style>



.main-content {
    margin-left: 220px;
    padding: 30px;
}


.card {
    background: #fff;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.1);
    margin-bottom: 30px;
}

.card h5 {
    margin-bottom: 15px;
    color: #0d6efd;
}


.form-group {
    margin-bottom: 15px;
}

label {
    font-weight: 600;
    margin-bottom: 6px;
    display: block;
}

input, select, textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 8px;
}


.btn {
    padding: 10px;
    border: none;
    border-radius: 8px;
    font-weight: bold;
    cursor: pointer;
}

.btn-primary {
    background: linear-gradient(45deg,#0d6efd,#198754);
    color: #fff;
}

.btn-success {
    background: #198754;
    color: #fff;
}


.alert {
    background: #d1e7dd;
    color: #0f5132;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
}


.grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 25px;
}


.table-wrapper {
    max-height: 300px; 
    overflow-y: auto; 
    overflow-x: hidden; 
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.1);
    margin-bottom: 30px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
}

thead {
    background: #e9ecef;
    position: sticky; 
    top: 0;
    z-index: 2;
}

th, td {
    padding: 14px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

tr:hover {
    background: #f1f1f1;
}


.table-wrapper: {
    width: 8px;
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
                  <a href="../Controller/TaskController.php">Manage Tasks</a>
                
                     <a href="../Controller/AdminSettingsController.php">Settings</a>
             <a href="/Project personal/MVC/Controller/logout.php">Logout</a>

</div>

<div class="top-navbar">
  <h5>Manage Tasks & Announcements</h5>
  <div style="color:#0d6efd;">Welcome, Admin</div>
</div>

<div class="main-content">


<?php if(!empty($messages)): ?>
  <?php foreach($messages as $msg): ?>
    <div class="alert"><?= htmlspecialchars($msg) ?></div>
  <?php endforeach; ?>
<?php endif; ?>

<div class="grid">

  
  <div class="card">
    <h5>Add New Task</h5>
    <form method="POST">
      <div class="form-group">
        <label>Volunteer</label>
        <select name="volunteer_id" required>
          <option value="">Select Volunteer</option>
          <?php if($volunteers && $volunteers->num_rows > 0): ?>
            <?php while($vol = $volunteers->fetch_assoc()): ?>
              <option value="<?= $vol['id'] ?>"><?= htmlspecialchars($vol['username']) ?></option>
            <?php endwhile; ?>
          <?php else: ?>
            <option value="">No volunteers found</option>
          <?php endif; ?>
        </select>
      </div>

    
  <div class="form-group">
    <label>Event Name</label>
    <select id="event_name" name="event_name" required>
        <option value="">Select Event</option>
        <?php foreach ($events as $e): ?>
            <option value="<?= htmlspecialchars($e['name']) ?>" data-date="<?= htmlspecialchars($e['date']) ?>">
                <?= htmlspecialchars($e['name']) ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

<div class="form-group">
    <label>Task Name</label>
    <input type="text" name="task_name" required>
</div>

<div class="form-group">
    <label>Task Date</label>
    <input type="date" id="task_date" name="task_date" required>
</div>

<script>
    const eventSelect = document.getElementById('event_name');
    const taskDateInput = document.getElementById('task_date');

    eventSelect.addEventListener('change', function() {
        const selectedOption = eventSelect.options[eventSelect.selectedIndex];
        taskDateInput.value = selectedOption.getAttribute('data-date') || '';
    });
</script>



      <button type="submit" name="add_task" class="btn btn-primary">Add Task</button>
    </form>
  </div>

<div class="card table-wrapper  "  >
    <h5>Add Announcement</h5>
    <form method="POST">
        <textarea name="add_announcement" required></textarea>
        <input type="date" name="event_date">
        <button type="submit" name="add_announcement_submit" class="btn btn-primary">Add Announcement</button>
    </form>
   

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Event Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if(!empty($announcements)): ?>
    <?php foreach($announcements as $ann): ?>
        <tr>
            <td><?= htmlspecialchars($ann['id']) ?></td>
            <td><?= htmlspecialchars($ann['message']) ?></td>
            <td><?= htmlspecialchars($ann['event_date'] ?? '-') ?></td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr><td colspan="3">No announcements found</td></tr>
<?php endif; ?>

    </tbody>
</table>

  </div>

        </div>





<h5 style="margin:25px 0;color:#0d6efd;">Existing Tasks</h5>
<table >
<thead>
<tr>
  <th>Volunteer</th>
  <th>Event</th>
  <th>Task</th>
  <th>Status</th>
  <th>Task Date</th>
</tr>
</thead>
<tbody>
<?php if(!empty($tasks) && $tasks->num_rows > 0): ?>
  <?php while($task = $tasks->fetch_assoc()): ?>
    <tr>
      <td><?= htmlspecialchars($task['volunteer_id'] ?? '-') ?></td>
      <td><?= htmlspecialchars($task['event_name'] ?? '-') ?></td>
      <td><?= htmlspecialchars($task['task_name'] ?? '-') ?></td>
      <td><?= htmlspecialchars($task['status'] ?? 'Pending') ?></td>
      <td><?= htmlspecialchars($task['task_date'] ?? '-') ?></td>
    </tr>
  <?php endwhile; ?>
<?php else: ?>
  <tr><td colspan="5">No tasks found</td></tr>
<?php endif; ?>
</tbody>
</table>

</div>
</body>
</html>
