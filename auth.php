<?php
session_start();

// Подключение к базе данных
$host = 'localhost';
$port = 3306;
$dbname = 'help';
$username = 'root';
$password = ''; // Пароль для подключения

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname: " . $pe->getMessage());
}

// Проверка наличия и корректности логина и пароля
if (!isset($_POST['email'], $_POST['password'])) {
    $_SESSION['login_error'] = 'Please enter email and password';
    header('Location: login.php');
    exit();
}

$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (empty($email) || empty($password)) {
    $_SESSION['login_error'] = 'Please enter email and password';
    header('Location: login.php');
    exit();
}

// Выполнение запроса к базе данных
$stmt = $conn->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
$stmt->execute(['email' => $email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['is_admin'] = $user['is_admin'];
    header('Location: index.php');
    exit();
} else {
    $_SESSION['login_error'] = 'Invalid email or password';
    header('Location: login.php');
    exit();
}
?>