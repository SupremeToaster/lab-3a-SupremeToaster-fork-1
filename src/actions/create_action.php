<?php
session_start();
include 'db_connection.php'; // Assume you have a db_connection.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

    $stmt = $conn->prepare("INSERT INTO tasks (text, date, user_id) VALUES (:text, :date, :user_id)");
    $stmt->bindParam(':text', $text, PDO::PARAM_STR);
    $stmt->bindParam(':date', $date, PDO::PARAM_STR);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: index.php");
}
?>
