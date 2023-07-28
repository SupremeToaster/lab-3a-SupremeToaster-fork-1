<?php
session_start();

// Read variables and create connection
$mysql_servername = getenv("MYSQL_SERVERNAME");
$mysql_user = getenv("MYSQL_USER");
$mysql_password = getenv("MYSQL_PASSWORD");
$mysql_database = getenv("MYSQL_DATABASE");
$conn = new mysqli($mysql_servername, $mysql_user, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

// Get the submitted form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if username exists
$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    $_SESSION['error'] = 'Username does not exist.';
    header('Location: ../views/login.php');
    exit();
}

// Check password
$user = $result->fetch_assoc();
if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = 'Invalid password.';
    header('Location: ../views/login.php');
    exit();
}

// Log the user in
$_SESSION['logged_in'] = true;
$_SESSION['username'] = $username;
header('Location: ../index.php');

?>