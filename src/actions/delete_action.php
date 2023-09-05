<?php
session_start();
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $task_id = $_POST['task_id'];

    $stmt = $conn->prepare("DELETE FROM tasks WHERE id = :task_id");
    $stmt->bindParam(':task_id', $task_id, PDO::PARAM_INT);
    $stmt->execute();

    $sort = isset($_POST['sort']) ? 'sort=on' : '';
    $filter = isset($_POST['filter']) ? 'filter=on' : '';
    $redirectParams = implode('&', array_filter([$sort, $filter]));

    header("Location: ../index.php?$redirectParams");
}
?>
