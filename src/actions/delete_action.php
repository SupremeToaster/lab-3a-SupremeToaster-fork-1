<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];

    $stmt = $conn->prepare("UPDATE tasks SET done = :done WHERE id = :task_id");
    $stmt->bindParam(':done', $done, PDO::PARAM_INT);
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: ../index.php");
}
?>
