
<!DOCTYPE html>
<html lang="en">
<head>
<title>Admin - Manage Tasks</title>

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

.sidebar img
            {
              width:90px;
              border-radius:50%;
              display:block;
              margin:10px auto 20px;
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

.card
      {
        background:#fff;
        padding:25px;
        border-radius:12px;
        box-shadow:0 4px 12px rgba(0,0,0,.1);
        margin-bottom:30px;
      }

.card h5
        {
          margin-bottom:15px;
          color:#0d6efd;
        }

.form-group
            {
              margin-bottom:15px;
            }

label
      {
        font-weight:600;
        margin-bottom:6px;
        display:block;
      }

input, select, textarea
                {
                  width:100%;
                  padding:10px;
                  border:1px solid #ccc;
                  border-radius:8px;
                }


.btn
      {
        padding:10px;
        border:none;
        border-radius:8px;
        font-weight:bold;
        cursor:pointer;
      }

.btn-primary
          {
            background:linear-gradient(45deg,#0d6efd,#198754);
            color:#fff;
          }

.btn-success
            {
              background:#198754;
              color:#fff;
            }

.alert
      {
        background:#d1e7dd;
        color:#0f5132;
        padding:12px;
        border-radius:8px;
        margin-bottom:20px;
      }


.grid
      {
        display:grid;
        grid-template-columns:1fr 1fr;
        gap:25px;
      }

table
      {
        width:100%;
        border-collapse:collapse;
        background:#fff;
        border-radius:12px;
        overflow:hidden;
        box-shadow:0 4px 12px rgba(0,0,0,.1);
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
</style>
</head>

<body>

<div class="sidebar">
  <img src="445492922_122100097214350632_1896056624552573141_n.jpg" alt="Admin">
          <a href="">Dashboard</a>
          <a href="">Manage Users</a>
          <a href="i">Manage Events</a>
          <a href="">Registrations</a>
          <a href="">Manage Tasks & Announcements</a>
          <a href="">Reports</a>
          <a href="">Settings</a>
          <a href="">Logout</a>
</div>

<div class="top-navbar">
  <h5>Manage Tasks & Announcements</h5>
  <div style="color:#0d6efd;">Welcome, </div>
</div>

<div class="main-content">
<div class="grid">
<div class="card">
  
<h5>Add New Task</h5>
<form method="POST">
<div class="form-group">
<label>Volunteer</label>
</div>

<div class="form-group">
<label>Event Name</label>
</select>
</div>

<div class="form-group">
<label>Task Name</label>
<input type="text" name="task_name" required>
</div>

<div class="form-group">
<label>Task Date</label>
<input type="date" name="task_date" required>
</div>

<button type="submit" name="add_task" class="btn btn-primary">Add Task</button>
</form>
</div>


<div class="card">
<h5>Add Announcement</h5>
<form method="POST">
<div class="form-group">
<label>Message</label>
<textarea name="add_announcement" rows="3" required></textarea>
</div>

<div class="form-group">
<label>Event Date (Optional)</label>
<input type="date" name="event_date">
</div>

<button type="submit" name="add_announcement" class="btn btn-success">Add Announcement</button>
</form>
</div>

</div>

<h5 style="margin:25px 0;color:#0d6efd;">Existing Tasks</h5>

<table>
  <thead>
      <tr>
          <th>Volunteer</th>
          <th>Event</th>
          <th>Task</th>
          <th>Status</th>
          <th>Date</th>
          </tr>
        </thead>
</table>

</div>
</body>
</html>
