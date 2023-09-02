<?php
// db_connection.php

// Database credentials
$servername = "mariadb";  // Replace with your server name or IP
$username = "SupremeToaster";          // Replace with your MariaDB username
$password = "ilostmy1sthtc~";      // Replace with your MariaDB password
$dbname = "lab_3";   // Replace with your database name

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Uncomment the line below to test the connection
    // echo "Connected successfully";
} catch (PDOException $e) {
    // Display error message if connection fails
    echo "Connection failed: " . $e->getMessage();
}
?>
