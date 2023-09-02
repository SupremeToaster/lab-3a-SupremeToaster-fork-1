<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST['text'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id'];
    $done = 0;  // Task not done

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO tasks (user_id, text, date, done) VALUES (:user_id, :text, :date, :done)");

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':done', $done, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        header('Location: ../index.php');
    } else {
        echo "Error: " . $stmt->errorInfo()[2];
    }
}
?>
