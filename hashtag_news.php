<?php
// Подключение к базе данных
require 'mysql.php';

$hashtag = $_GET['hashtag'] ?? '';

if ($hashtag) {
    // Поиск новостей по хэштегу
    $stmt = $pdo->prepare("SELECT * FROM news WHERE text LIKE ?");
    $stmt->execute(['%' . $hashtag . '%']);
    $news = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<h1>Результаты поиска по хэштегу: <?= htmlspecialchars($hashtag) ?></h1>

<?php if (!empty($news)): ?>
    <?php foreach ($news as $article): ?>
        <h2><a href="article_news.php?id=<?= $article['id'] ?>"><?= $article['title'] ?></a></h2>
        <p><?= substr($article['text'], 0, 100) ?>...</p>
    <?php endforeach; ?>
<?php else: ?>
    <p>Новостей по данному хэштегу не найдено.</p>
<?php endif; ?>
