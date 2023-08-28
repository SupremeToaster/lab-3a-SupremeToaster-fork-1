<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 'yes') {
    // Redirect to login page if not logged in
    header("Location: views/login.php");
    exit;
}
?>

<?php
session_start();
include 'db_connection.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    echoTask($row);
}

function echoTask($task) {
    // Your HTML code to display each task
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <!-- Add an appropriate title in this tag -->
  <title>
    Lab-3A
  </title>
  <!-- Links to stylesheets -->
</head>

<body>
  <!-- Your visible elements -->
  <nav class ="navbar">
    <a class=""
      href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My
      Resume</a>
      <!-- Other navigation links -->
    <a href="actions/logout_action.php">Log Out</a>
  </nav>
  <h1>My To-Do</h1>
  <input type="checkbox" class="toggle-switch" id="cb-sort" /><label for="cb-sort">Sort by date</label>
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
  </ul>
  <form class="form-create-task">
    <input type="text" name="description" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
  </form>
  <!-- Links to scripts -->
  <script src="js/script.js"></script>
</body>

</html>