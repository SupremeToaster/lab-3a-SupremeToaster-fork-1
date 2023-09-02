<?php
// Start session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== 'yes') {
    // Redirect to login page if not logged in
    header("Location: views/login.php");
    exit;
}

include 'db_connection.php'; // Assume you have a db_connection.php file

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/style.css">
  <title>Lab-3A</title>
</head>

<body>
  <nav class="navbar">
    <a href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My Resume</a>
    <a href="actions/logout_action.php">Log Out</a>
  </nav>
  <h1>My To-Do List</h1>
  <input type="checkbox" class="toggle-switch" id="cb-sort" /><label for="cb-sort">Sort by date</label>
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
    <?php
    foreach ($result as $row) {
        echo "<li>" . $row['description'] . " - " . $row['date'] . "</li>";
    }
    ?>
  </ul>
  <form class="form-create-task" action="actions/create_action.php" method="post">
    <input type="text" name="tasks" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
  </form>
  <!-- Links to scripts -->
  <script src="js/script.js"></script>
</body>

</html>
