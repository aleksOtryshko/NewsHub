<?php
session_start();

// Проверка, авторизован ли пользователь
if (!isset($_SESSION['user'])) {
    echo "Вы должны авторизоваться, чтобы добавить новость.";
    exit;
}
?>

<!-- Форма добавления новости отправляет данные на news_handler.php -->
<form method="post" action="news_handler.php">
    Заголовок: <input type="text" name="title" required><br>
    Текст: <textarea name="text" required></textarea><br>
    <input type="submit" value="Добавить новость">
</form>
