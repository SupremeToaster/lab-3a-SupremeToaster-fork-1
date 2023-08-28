<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 'yes') {
    header("Location: views/login.php");
    exit;
}

include 'db_connection.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
$result = $conn->query($sql);

function echoTask($task) {
    echo '<li>' . $task['description'] . ' - ' . $task['date'] . '</li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lab-3A</title>
</head>
<body>
  <nav class="navbar">
    <a href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My Resume</a>
    <a href="actions/logout_action.php">Log Out</a>
  </nav>

  <h1>My To-Do</h1>
  <form class="form-create-task" action="actions/create_action.php" method="post">
    <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
    <ul id="taskContainer" class="tasklist">
      <?php
      while ($row = $result->fetch_assoc()) {
          echoTask($row);
      }
      ?>
    </ul>
  </form>
</body>
</html>
<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 'yes') {
    header("Location: views/login.php");
    exit;
}

include 'db_connection.php';

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = '$user_id'";
$result = $conn->query($sql);

function echoTask($task) {
    echo '<li>' . $task['description'] . ' - ' . $task['date'] . '</li>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Lab-3A</title>
</head>
<body>
  <nav class="navbar">
    <a href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My Resume</a>
    <a href="actions/logout_action.php">Log Out</a>
  </nav>

  <h1>My To-Do</h1>
  <form class="form-create-task" action="actions/create_action.php" method="post">
    <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
    <ul id="taskContainer" class="tasklist">
      <?php
      while ($row = $result->fetch_assoc()) {
          echoTask($row);
      }
      ?>
    </ul>
  </form>
</body>
</html>
