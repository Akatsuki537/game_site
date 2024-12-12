<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ゲーム一覧 - ゲーム情報まとめサイト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>ゲーム情報まとめサイト</h1>
        <nav>
            <a href="index.php">ホーム</a>
            <a href="games.php">ゲーム一覧</a>
            <a href="about.php">サイトについて</a>
            <a href="contact.php">お問い合わせ</a>
        </nav>
    </header>

    <main>
        <section class="games-list">
            <h2>ゲーム一覧</h2>
            <p>お好きなゲームを選択して、掲示板や攻略情報をご覧ください。</p>
            <ul>
            <?php
include 'db.php';

$result = $conn->query("SELECT * FROM games");

while ($row = $result->fetch_assoc()) {
    echo '<div class="game-item">';
    echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
    echo '<p>' . htmlspecialchars($row['description']) . '</p>';
    echo '<a href="game_detail.php?game_id=' . $row['id'] . '">詳細を見る</a>';
    echo '</div>';
}
?>
            </ul>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 ゲーム情報まとめサイト</p>
    </footer>
</body>
</html>
