<?php
include 'db.php'; // データベース接続

// ゲームID取得（例: URLのクエリパラメータから取得）
$game_id = $_GET['game_id'] ?? 0;

// 投稿取得
$sql = "SELECT * FROM posts WHERE game_id = $game_id ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<h2>投稿一覧</h2>

<?php while ($row = $result->fetch_assoc()): ?>
    <div class="post">
        <h3><?php echo htmlspecialchars($row['title']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($row['content'])); ?></p>
        <small>投稿日: <?php echo $row['created_at']; ?></small>
        
        <!-- 削除ボタン付きフォーム -->
        <form action="delete_post.php" method="POST" style="display:inline;">
            <input type="hidden" name="post_id" value="<?php echo $row['id']; ?>">
            <button type="submit" onclick="return confirm('本当に削除しますか？');">削除</button>
        </form>
    </div>
<?php endwhile; ?>
