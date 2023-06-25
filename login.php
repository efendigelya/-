<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Вход</title>
</head>
<body>
<?php if(isset($_SESSION['login_error'])) : ?>
    <div style="color:red"><?= $_SESSION['login_error'] ?></div>
    <?php unset($_SESSION['login_error']); ?>
<?php endif; ?>
<h1>Вход</h1>
<form method="post" action="login_handler.php">
    <label for="username">Логин:</label>
    <input type="text" name="username"><br>
    <label for="password">Пароль:</label>
    <input type="password" name="password"><br>
    <input type="submit" value="Войти">
</form>
</body>
</html>