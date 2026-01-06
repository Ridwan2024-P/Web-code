<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../../Views/CSS/admanageevent.css">
  <title>
      Manage Events - Admin
        </title>

         <style>
 
</style>
</head>

<body>

     <div class="sidebar">
           <h4>Admin</h4>
            <a href="#">Dashboard</a>
            <a href="#">Manage Users</a>
            <a href="#">Manage Events</a>
            <a href="#">Registrations</a>
           <a href="#">Reports</a>
           <a href="#">Settings</a>
           <a href="#">Logout</a>
            </div>

<div class="top-navbar">
        <h5>Manage Events</h5>
        <div>Welcome, Admin</div>
            </div>

<div class="main-content">
 <div class="top-actions">
    <input type="text" class="search-input" placeholder="Search events..." >
    <button class="add-btn">Add New Event</button>
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
        <tr>
          <td>1</td>
          <td>Football Tournament</td>
          <td>2025-09-15</td>
          <td>Main Field</td>
          <td>32</td>
          <td><span class="status scheduled">Scheduled</span></td>
          <td>
            <button class="action-btn edit">Edit</button>
            <button class="action-btn delete">Delete</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Basketball Match</td>
          <td>2025-09-20</td>
          <td>Gymnasium</td>
          <td>16</td>
          <td><span class="status pending">Pending</span></td>
          <td>
            <button class="action-btn edit">Edit</button>
            <button class="action-btn delete">Delete</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>

</div>

</body>
</html>
