<?php
include 'db.php';
$game_id = $_GET['game_id'];
$result = $conn->query("SELECT * FROM strategies WHERE game_id = $game_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>攻略情報</title>
</head>
<body>
    <h1>攻略情報</h1>
    <form action="strategy_submit.php" method="post">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="text" name="user_name" placeholder="名前">
        <input type="text" name="title" placeholder="タイトル">
        <textarea name="content" placeholder="攻略内容"></textarea>
        <button type="submit">投稿</button>
    </form>
    <ul>
        <?php while ($strategy = $result->fetch_assoc()): ?>
            <li><strong><?php echo htmlspecialchars($strategy['title']); ?></strong> by <?php echo htmlspecialchars($strategy['user_name']); ?>: <?php echo htmlspecialchars($strategy['content']); ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
