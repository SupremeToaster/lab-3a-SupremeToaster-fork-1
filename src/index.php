<?php
// Start session
session_start();

// Include the database connection file
include 'actions/db_connection.php';  // Adjust the path as needed

// Fetch tasks from the database
$user_id = $_SESSION['user_id'];
$sortQuery = isset($_GET['sort']) ? "ORDER BY date ASC" : "";
$query = "SELECT * FROM tasks WHERE user_id = :user_id $sortQuery";
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
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
  <form action="index.php" method="get">
  <input type="checkbox" class="toggle-switch" id="cb-sort" name="sort" <?php if (isset($_GET['sort'])) echo 'checked'; ?> onchange="this.form.submit()" />
  <label for="cb-sort">Sort by date</label>
  <button type="submit" style="display:none;"></button>
  </form>
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
    <?php
      if (isset($result) && is_array($result) && count($result) > 0) {
        foreach ($result as $row) {
            $checkedStatus = $row['done'] ? "checked" : "";
            $checkedClass = $row['done'] ? "task-checked" : "";
            $prettyDate = date("Y-m-d", strtotime($row['date']));
            echo "<form action='actions/update_action.php' method='post'>";
            echo "<li class='task'>";
            echo "<input type='checkbox' class='task-done checkbox-icon' name='done' $checkedStatus />";
            echo "<input type='hidden' name='task_id' value='" . $row['id'] . "' />";
            echo "<span class='task-description $checkedClass'>" . $row['text'] . "</span>";
            echo "<span class='task-date'>$prettyDate</span>";
            echo "<button type='submit' class='task-delete material-icon'>backspace</button>";
            echo "</li>";
            echo "</form>";
        }
      } else {
        echo "<li>No tasks found.</li>";
      }
    ?>
</ul>
  <form class="form-create-task" action="actions/create_action.php" method="post">
    <input type="text" name="text" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
  </form>
  <!-- Links to scripts -->
  <script src="js/script.js"></script>
</body>

</html>
