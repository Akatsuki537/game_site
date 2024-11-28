<?php
// データベース接続情報
$host = "localhost"; // ホスト名
$username = "root"; // データベースユーザー名
$password = ""; // データベースパスワード
$dbname = "game_site"; // データベース名

// 接続処理
try {
    $conn = new mysqli($host, $username, $password, $dbname);

    // 接続エラーチェック
    if ($conn->connect_error) {
        throw new Exception("データベース接続に失敗しました: " . $conn->connect_error);
    }
} catch (Exception $e) {
    die("エラー: " . $e->getMessage());
}
?>
