<?php
session_start();
include 'db_connection.php'; // Assume you have a db_connection.php file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST['text'];
    $date = $_POST['date'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session

    $stmt = $conn->prepare("INSERT INTO text (text, date, user_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $text, $date, $user_id);
    $stmt->execute();

    header("Location: index.php");
}
?>
