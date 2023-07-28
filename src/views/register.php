<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>Register</title>
  <link rel="stylesheet" href="../style.css" />
</head>

<body>
  <h1>Register</h1>
  <form action="../actions/register_action.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <label for="conf_password">Confirm Password:</label><br>
    <input type="password" id="conf_password" name="conf_password" required><br>
    <input type="submit" value="Register">
  </form>
</body>

</html>