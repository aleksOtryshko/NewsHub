<?php
// Подключение к базе данных
require 'mysql.php';

$id = $_GET['id'] ?? null;

if ($id) {
    // Получение полной версии новости по ID
    $stmt = $pdo->prepare("SELECT * FROM news WHERE id = ?");
    $stmt->execute([$id]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($article) {
        echo "<h1>{$article['title']}</h1>";
        echo "<p>{$article['text']}</p>";
    } else {
        echo "Новость не найдена.";
    }
} else {
    echo "ID новости не передан.";
}
?>
