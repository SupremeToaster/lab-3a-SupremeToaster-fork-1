<?php
// Start session
session_start();

// Include the database connection file
include 'actions/db_connection.php';  // Adjust the path as needed

// Fetch tasks from the database
// Initialize the WHERE clauses and sorting
$whereClauses = ["user_id = :user_id"];
$sortQuery = isset($_GET['sort']) ? "ORDER BY date ASC" : "";

// Add filter condition if the filter checkbox is checked
if (isset($_GET['filter'])) {
    $whereClauses[] = "done = 0";
}

// Construct the WHERE clause
$whereClause = implode(' AND ', $whereClauses);

// Construct the final SQL query
$query = "SELECT * FROM tasks WHERE $whereClause $sortQuery";

// Prepare and execute the SQL query
$stmt = $conn->prepare($query);
$stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();

// Fetch the results
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

  <input type="checkbox" class="toggle-switch" id="cb-filter" name="filter" <?php if (isset($_GET['filter'])) echo 'checked'; ?> onchange="this.form.submit()" />
  <label for="cb-filter">Filter completed tasks</label>

  <button type="submit" style="display:none;"></button>
  </form>


  <?php
    // Display the tasks
    echo "<ul class='task-list'>";
     if (isset($result) && is_array($result) && count($result) > 0) {
       foreach ($result as $row) {
           $checkedStatus = $row['done'] ? "checked" : "";
           $checkedClass = $row['done'] ? "task-checked" : "";
           $prettyDate = date("Y-m-d", strtotime($row['date']));

           echo "<li class='task'>";

           // Update form
           echo "<form action='actions/update_action.php' method='post'>";
           echo "<input type='checkbox' class='task-done checkbox-icon' name='done' $checkedStatus />";
           echo "<input type='hidden' name='task_id' value='" . $row['id'] . "' />";
           echo "<span class='task-description $checkedClass'>" . $row['text'] . "</span>";
           echo "<span class='task-date'>$prettyDate</span>";
           echo "</form>";

           // Delete form
           echo "<form action='actions/delete_action.php' method='post'>";
           echo "<input type='hidden' name='task_id' value='" . $row['id'] . "' />";
           echo "<button type='submit' class='task-delete material-icon'>backspace</button>";
           echo "</form>";

           echo "</li>";
        }
      } else {
           echo "<li>No tasks found.</li>";
      }
    echo "</ul>";
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
