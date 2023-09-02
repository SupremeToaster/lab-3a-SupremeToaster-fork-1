<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $done = $_POST['done'];

    $stmt = $conn->prepare("UPDATE text SET done = ? WHERE id = ?");
    $stmt->bind_param("ss", $done, $task_id);
    $stmt->execute();

    header("Location: index.php");
}
?>
