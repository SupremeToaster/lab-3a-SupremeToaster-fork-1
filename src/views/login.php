<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Login</title>
  <link rel="stylesheet" href="../css/style.css" />


</head>

<body>
  <h1>Login</h1>
  <form action="../actions/login_action.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Login">
  </form>
</body>

</html>