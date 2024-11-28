<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_id = $_POST['game_id'];
    $user_name = $_POST['user_name'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (game_id, user_name, content, created_at) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("iss", $game_id, $user_name, $content);
    $stmt->execute();
    header("Location: board.php?game_id=" . $game_id);
}
?>
