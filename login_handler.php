<?php
session_start();

$host = 'localhost';
$port = 3306;
$dbname = 'help';
$username = 'root';
$password = ''; // Пароль для подключения

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}

$username = $_POST['name'];
$password = $_POST['password'];

$stmt = $conn->prepare('SELECT * FROM users WHERE username = :username and password = :password');
$stmt->execute(array('username' => $username, 'password' => $password));
$user = $stmt->fetch();

if ($user !== false) {
    $_SESSION['username'] = $user['username'];
    header('Location: index.php');
    exit();
} else {
    $_SESSION['login_error'] = 'Invalid username or password';
    header('Location: login.php');
    exit();
}
