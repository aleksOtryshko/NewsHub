<?php
// Подключение к базе данных
require 'mysql.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
    $title = $_POST['title'];
    $text = $_POST['text'];

    if (!empty($title) && !empty($text)) {
        // Добавление новости в базу данных
        $stmt = $pdo->prepare("INSERT INTO news (title, text, status) VALUES (?, ?, 1)");
        $stmt->execute([$title, $text]);

        echo "Новость добавлена!";
    } else {
        echo "Заполните все поля.";
    }
} else {
    echo "Вы должны авторизоваться для добавления новости.";
}
?>
