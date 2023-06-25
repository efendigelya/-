<?php
session_start();
if(isset($_SESSION['login_error'])) {
    $error = $_SESSION['login_error'];
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
<?php if(isset($error)) :?>
    <div style="color:red"><?= $error ?></div>
<?php endif; ?>
<h1>Вход</h1>
<form method="post" action="login.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Log in</button>
</form>
</body>
</html>
