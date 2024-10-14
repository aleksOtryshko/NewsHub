<?php
// Подключение к базе данных
require 'mysql.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Проверка логина и пароля
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $login;
        header("Location: admin.php"); // Перенаправление на страницу добавления новостей
        exit;
    } else {
        echo "Неправильный логин или пароль.";
    }
}
?>
