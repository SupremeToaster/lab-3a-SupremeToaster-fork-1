<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];

    $stmt = $conn->prepare("DELETE FROM text WHERE id = ?");
    $stmt->bind_param("s", $task_id);
    $stmt->execute();

    header("Location: index.php");
}
?>
