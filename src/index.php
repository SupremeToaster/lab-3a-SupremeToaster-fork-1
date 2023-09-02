<?php
// Start session
session_start();

// Include the database connection file
include 'actions/db_connection.php';  // Adjust the path as needed

// Your PHP code for adding a new task
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (text, date, user_id, done) VALUES (:text, :date, :user_id, :done)");
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':done', $done, PDO::PARAM_INT);  // Assuming $done is a variable holding the value for 'done'

    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Error: Could not execute the query.";
    }
}

// Fetch tasks from the database
$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT * FROM tasks WHERE user_id = :user_id");
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
  <input type="checkbox" class="toggle-switch" id="cb-sort" /><label for="cb-sort">Sort by date</label>
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
    <?php
    if (isset($result) && is_array($result) && count($result) > 0) {
        foreach ($result as $row) {
            echo "<li>" . $row['text'] . " - " . $row['date'] . "</li>";
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
