<?php
include 'db.php'; // データベース接続

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POSTデータから投稿IDを取得
    $post_id = $_POST['post_id'] ?? 0;

    if ($post_id > 0) {
        // 投稿を削除するSQLクエリ
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param("i", $post_id);

        if ($stmt->execute()) {
            // 削除成功時
            echo "<script>alert('投稿が削除されました。'); window.location.href='board.php?game_id={$_GET['game_id']}';</script>";
        } else {
            // 削除失敗時
            echo "<script>alert('削除に失敗しました。'); history.back();</script>";
        }
    } else {
        echo "<script>alert('不正なリクエストです。'); history.back();</script>";
    }
}
?>
