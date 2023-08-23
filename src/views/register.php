<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Add an appropriate title in this tag -->
  <title>Login</title>
  <!-- Links to stylesheets -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <nav>Register page</a></nav>
  <form action="/actions/register_action.php" method="post">  <!-- Modified part -->
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required>
    <br>
    <input type="submit" value="Register">
  </form>
</body>

