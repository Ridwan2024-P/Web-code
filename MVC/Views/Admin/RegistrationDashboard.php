
<!DOCTYPE html>
<html lang="en">
<head>
<title>
      Admin - Manage Registrations
       </title>

<style>
        *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Poppins', Arial, sans-serif;
        }

body
     {
        background:#f4f6f9;
        }

.sidebar
        {
        position:fixed;
        top:0;
        left:0;
        width:220px;
        height:100vh;
        background:#0d6efd;
        padding-top:20px;
        }

.sidebar h4
            {
            text-align:center;
            color:#ffd369;
            margin-bottom:25px;
            }

.sidebar a
            {
            display:block;
            color:#fff;
            text-decoration:none;
            padding:12px 20px;
            margin:6px 12px;
            border-radius:8px;
            transition:.3s;
            }

.sidebar a:hover
            {
            background:#084298;
            }

.top-navbar
            {
            margin-left:220px;
            background:#fff;
            padding:15px 30px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            box-shadow:0 2px 8px rgba(0,0,0,.1);
            position:sticky;
            top:0;
            }

.top-navbar h5
            {
            color:#0d6efd;
            }

.main-content
            {
            margin-left:220px;
            padding:30px;
            }

.search-input
            {
            width:260px;
            padding:10px;
            border:1px solid #ccc;
            border-radius:8px;
            margin-bottom:20px;
            }

.card{
  background:#fff;
  padding:25px;
  border-radius:12px;
  box-shadow:0 4px 12px rgba(0,0,0,.1);
}

table
        {
        width:100%;
        border-collapse:collapse;
        }

thead
     {
        background:#e9ecef;
        }

th,td
    {
    padding:14px;
    border-bottom:1px solid #ddd;
    text-align:left;
    }

tr:hover
        {
        background:#f1f1f1;
        }

.badge
        {
        padding:6px 12px;
        border-radius:20px;
        font-size:13px;
        color:#fff;
        }

.bg-warning{ background:#ffc107; color:#000; }
.bg-success{ background:#198754; }
.bg-danger{ background:#dc3545; }
.bg-secondary{ background:#6c757d; }

    .btn
        {
        padding:6px 12px;
        border:none;
        border-radius:6px;
        font-size:14px;
        cursor:pointer;
        font-weight:bold;
        }

        .btn-success{ background:#198754; color:#fff; }
        .btn-danger{ background:#dc3545; color:#fff; }
        .btn-secondary{ background:#6c757d; color:#fff; cursor:not-allowed; }
</style>
</head>

<body>


<div class="sidebar">
  <h4><?= htmlspecialchars($_SESSION['role'] === 'admin' ? 'Admin' : 'Volunteer') ?></h4>

  <?php if($_SESSION['role'] === 'admin'): ?>
    <a href="">Dashboard</a>
    <a href="">Manage Users</a>
    <a href="">Manage Events</a>
    <a href="">Registrations</a>
    <a href="index.php?action=adminTasks">Manage Tasks & Announcements</a>
    <a href="index.php?action=reports">Reports</a>
    <a href="index.php?action=settings">Settings</a>
  <?php else: ?>
    <a href="index.php?action=volunteerDashboard">Dashboard</a>
    <a href="index.php?action=manageUsers">Manage Users</a>
    <a href="index.php?action=manageRegistrations">Registrations</a>
    <a href="index.php?action=dashboardd">Users Dashboard</a>
  <?php endif; ?>

  <a href="index.php?action=logout">Logout</a>
</div>


<div class="top-navbar">
  <h5>Manage Registrations</h5>
  <div style="color:#0d6efd;">
    Welcome, <?= htmlspecialchars($_SESSION['username'] ?? 'Admin') ?>
  </div>
</div>


<div class="main-content">

<input type="text" id="searchInput" class="search-input"
       placeholder="Search registration..." onkeyup="searchTable()">

<div class="card">
<table id="registrationTable">
  <thead>
    <tr>
      <th>#</th>
      <th>Student Name</th>
      <th>Email</th>
      <th>Event</th>
      <th>Registration Date</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
<?php if($registrations && $registrations->num_rows > 0): ?>
<?php while($row = $registrations->fetch_assoc()): ?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['student_name']) ?></td>
<td><?= htmlspecialchars($row['email']) ?></td>
<td><?= htmlspecialchars($row['event_name']) ?></td>
<td><?= htmlspecialchars($row['registration_date']) ?></td>
<td>
<?php
$status = $row['status'];
$class = match($status){
  'Pending' => 'bg-warning',
  'Approved' => 'bg-success',
  default => 'bg-danger'
};
?>
<span class="badge <?= $class ?>"><?= $status ?></span>
</td>
<td>
        <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

<?php if($status === 'Pending'): ?>
<button name="action" value="approve" class="btn btn-success">Approve</button>
<button name="action" value="reject" class="btn btn-danger">Reject</button>

<?php elseif($status === 'Approved'): ?>
<button class="btn btn-secondary" disabled>Approved</button>
<button name="action" value="reject" class="btn btn-danger">Reject</button>

<?php else: ?>
<button name="action" value="approve" class="btn btn-success">Approve</button>
<button class="btn btn-secondary" disabled>Rejected</button>
<?php endif; ?>
</form>
</td>
</tr>
<?php endwhile; ?>
<?php else: ?>
<tr><td colspan="7">No registrations found</td></tr>
<?php endif; ?>
</tbody>
</table>
</div>

</div>

<script>
function searchTable(){
  const input = document.getElementById("searchInput").value.toLowerCase();
  document.querySelectorAll("#registrationTable tbody tr").forEach(row=>{
    const text = row.innerText.toLowerCase();
    row.style.display = text.includes(input) ? "" : "none";
  });
}
</script>

</body>
</html>
