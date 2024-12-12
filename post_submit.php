<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];
    $username = $_POST['username'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (game_id, username, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $game_id, $username, $content);
    $stmt->execute();

    header("Location: game_detail.php?game_id=$game_id");
    exit;
}
?>
