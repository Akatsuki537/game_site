
<?php
include 'db.php';

// ゲームIDをGETパラメータから取得
if (isset($_GET['game_id'])) {
    $game_id = $_GET['game_id'];

    // ゲーム情報取得
    $stmt = $conn->prepare("SELECT * FROM games WHERE id = ?");
    $stmt->bind_param("i", $game_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $game = $result->fetch_assoc();
    } else {
        die("指定されたゲームは存在しません。");
    }

    // 投稿一覧取得
    $stmt_posts = $conn->prepare("SELECT * FROM posts WHERE game_id = ? ORDER BY created_at DESC");
    $stmt_posts->bind_param("i", $game_id);
    $stmt_posts->execute();
    $posts = $stmt_posts->get_result();

    // 攻略一覧取得
    $stmt_strategies = $conn->prepare("SELECT * FROM strategies WHERE game_id = ? ORDER BY created_at DESC");
    $stmt_strategies->bind_param("i", $game_id);
    $stmt_strategies->execute();
    $strategies = $stmt_strategies->get_result();
} else {
    die("ゲームIDが指定されていません。");
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($game['name']); ?></title>
    <link rel="stylesheet" href="style.css?ver=<?php echo time(); ?>">

</head>
<body>
    <nav>
        <ul>
            <li><a href="index.php">ホーム</a></li>
            <li><a href="games.php">ゲーム一覧</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1><?php echo htmlspecialchars($game['name']); ?></h1>
        <p><?php echo nl2br(htmlspecialchars($game['description'])); ?></p>

        <!-- 投稿一覧 -->
        <h2>ユーザー投稿</h2>
        <?php while ($post = $posts->fetch_assoc()): ?>
            <div class="post">
                <p><strong><?php echo htmlspecialchars($post['username']); ?></strong> さんの投稿</p>
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <p><small>投稿日: <?php echo $post['created_at']; ?></small></p>
            </div>
        <?php endwhile; ?>

        <!-- 投稿フォーム -->
        <h3>新しい投稿</h3>
        <form action="post_submit.php" method="POST">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <label for="username">ユーザー名:</label>
            <input type="text" name="username" required>
            <br>
            <label for="content">内容:</label>
            <textarea name="content" rows="4" required></textarea>
            <br>
            <button type="submit">投稿する</button>
        </form>

        <!-- 攻略一覧 -->
        <h2>攻略情報</h2>
        <?php while ($strategy = $strategies->fetch_assoc()): ?>
            <div class="strategy">
                <h3><?php echo htmlspecialchars($strategy['title']); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($strategy['content'])); ?></p>
                <p><small>投稿日: <?php echo $strategy['created_at']; ?></small></p>
            </div>
        <?php endwhile; ?>

        <!-- 攻略フォーム -->
        <h3>攻略情報を追加</h3>
        <form action="strategy_submit.php" method="POST">
            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
            <label for="title">タイトル:</label>
            <input type="text" name="title" required>
            <br>
            <label for="content">内容:</label>
            <textarea name="content" rows="4" required></textarea>
            <br>
            <button type="submit">攻略を投稿</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 ゲームサイト</p>
    </footer>
</body>
</html>
