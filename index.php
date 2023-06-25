<?php
include('dbconnect.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CYBERHELP</title>
    <link rel="stylesheet" href="css/cyber.css" />
    <link rel="icon" href="css/logo.png" />
</head>
<body class="body">
<header class="header">
    <div class="header-container">
        <img class="logo" src="css/logo.png" alt="попался" title="попался" />
        <div class="name">CYBERHELP</div>
        <form>
            <input type="text" placeholder="Торт..." />
            <button type="submit"></button>
        </form>
        <div class="auth">
            <div class="auth">
                <?php if (isset($_SESSION['username'])): ?>
                    <div>Добро пожаловать, <?= $_SESSION['username'] ?></div>
                    <div><a href='logout.php'>Выйти</a></div>
                <?php else: ?>
                    <div><a href='login.php'>Войти в систему</a></div>
                <?php endif; ?>
            </div>
        </div>
        <img class="cor" src="css/cor.png" />
    </div>
</header>
<div>
    <div class="k1">ПРАЗДНИК</div>
    <div class="k2">НАЧИНКИ</div>
    <div class="k3">АКЦИЯ</div>
    <div>
        <div class="product">
            <img class="f1" src="css/торт.png" />
            <div class="r1">ТОРТ</div>
        </div>
        <div class="product">
            <img class="f2" src="css/бенто.png" />
            <div class="r2">БЕНТО-ТОРТ</div>
        </div>

</body>
</html>