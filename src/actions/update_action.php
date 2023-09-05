<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];
    $done = isset($_POST['done']) ? 1 : 0;

    $stmt = $conn->prepare("UPDATE tasks SET done = ? WHERE id = ?");
    $stmt->bind_param("ii", $done, $task_id);
    $stmt->execute();

    header("Location: ../index.php");
}
?>
