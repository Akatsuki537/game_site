<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $game_id = $_POST['game_id'];
    $user_name = $_POST['user_name'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO strategies (game_id, user_name, title, content, created_at) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("isss", $game_id, $user_name, $title, $content);
    $stmt->execute();
    header("Location: strategies.php?game_id=" . $game_id);
}
?>
