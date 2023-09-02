<?php
session_start();
include 'db_connection.php'; // Assume you have a db_connection.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tasks = $_POST['tasks'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

    $stmt = $conn->prepare("INSERT INTO tasks (tasks, date, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $tasks, $date, $user_id);
    $stmt->execute();

    header("Location: index.php");
}
?>
