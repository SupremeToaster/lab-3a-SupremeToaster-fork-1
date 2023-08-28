<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 'yes') {
    // Redirect to login page if not logged in
    // Redirect to login page if not logged in
    // Redirect to login page if not logged in
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
    <form class="form-create-task">
    <input type="text" name="description" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
  </form>
}
?>

<!DOCTYPE html>
<html lang="en">

  <title>Lab-3A</title>
  <title>
    Lab-3A
  </title>
  <nav class="navbar">
    <a href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My Resume</a>
    <a class=""
      href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My
      Resume</a>
      <!-- Other navigation links -->
    <a href="actions/logout_action.php">Log Out</a>
  </nav>
    <?php
    while ($row = $result->fetch_assoc()) {
        echoTask($row);
    }
    ?>
  <h1>My To-Do</h1>
  <form class="form-create-task" action="actions/create_action.php" method="post">
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
  </ul>
  <form class="form-create-task">
    <input type="text" name="description" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
    
  <!-- Links to scripts -->
<?php
function echoTask($task) {
    // Your HTML code to display each task
    echo '<li>' . $task['description'] . ' - ' . $task['date'] . '</li>';
}
?></html></html></html></html>