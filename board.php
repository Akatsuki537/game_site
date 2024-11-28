<?php
include 'db.php';
$game_id = $_GET['game_id'];
$result = $conn->query("SELECT * FROM posts WHERE game_id = $game_id ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
</head>
<body>
    <h1>掲示板</h1>
    <form action="post_submit.php" method="post">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="text" name="user_name" placeholder="名前">
        <textarea name="content" placeholder="コメント"></textarea>
        <button type="submit">投稿</button>
    </form>
    <ul>
        <?php while ($post = $result->fetch_assoc()): ?>
            <li><strong><?php echo htmlspecialchars($post['user_name']); ?></strong>: <?php echo htmlspecialchars($post['content']); ?></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
