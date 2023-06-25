<?php
session_start();
// Удаляем имя пользователя из сессии
unset($_SESSION['username']);
header("Location: index.php");
?>