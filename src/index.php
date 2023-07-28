<?php

session_start();
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header('Location: views/login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css">
  <title>Lab-1A</title>
</head>
<body>
  <!-- Your visible elements -->
  <nav>
    <a href="https://707d8d6bdb434516a0857a9cc637bec2.vfs.cloud9.us-west-1.amazonaws.com/_static/public_html/portfoliolab/home.html">My Resume</a>
    <a href="actions/logout_action.php">Log Out</a>
  </nav>
  <h1>My Tasks Hello</h1>
  <input type="checkbox" class="toggle-switch" id="cb-sort" /><label for="cb-sort">Sort by date</label>
  <input type="checkbox" class="toggle-switch" id="cb-filter" /><label for="cb-filter">Filter completed tasks</label>
  <ul id="taskContainer" class="tasklist">
  </ul>
  <form class="form-create-task" onsubmit="on_submit(event)">
    <input type="text" name="description" required class="my-input" /><br>
    <input type="date" name="date" required class="my-input" /><br>
    <button class="button-styled">Create Task</button><br>
  </form>
  <script src="js/script1.js"></script>
</body>
</html>
