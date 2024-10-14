<?php
// Подключение к базе данных
require 'mysql.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Проверка на существование пользователя
    $stmt = $pdo->prepare("SELECT * FROM users WHERE login = ?");
    $stmt->execute([$login]);

    if ($stmt->rowCount() > 0) {
        echo "Пользователь с таким логином уже существует.";
    } else {
        // Хэширование пароля и сохранение в базе данных
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (login, password) VALUES (?, ?)");
        $stmt->execute([$login, $hashed_password]);

        echo "Регистрация успешна!";
    }
}
?>
