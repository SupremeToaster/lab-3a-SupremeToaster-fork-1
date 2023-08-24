<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Add an appropriate title in this tag -->
  <title>Login</title>
  <!-- Links to stylesheets -->
  <link rel="stylesheet" href="/css/style.css">
</head>

<body>
  <nav>Log in page</nav>
  <form action="/actions/login_action.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>
    <input type="submit" value="Login">
    <div class="divider">
        <div class="line"></div>
        <span class="text">Your Text Here</span>
        <div class="line"></div>
    </div>
  </form>
</body>