<?php
// Подключение к базе данных
require 'mysql.php';

// Выбор всех опубликованных новостей
$stmt = $pdo->query("SELECT * FROM news WHERE status = 1 ORDER BY id DESC");
$news = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Новости</h1>

<?php foreach ($news as $article): ?>
    <h2><a href="article_news.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
    <p><?= substr($article['text'], 0, 100) ?>...</p>
<?php endforeach; ?>
