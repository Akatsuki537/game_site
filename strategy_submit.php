<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO strategies (game_id, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $game_id, $title, $content);
    $stmt->execute();

    header("Location: game_detail.php?game_id=$game_id");
    exit;
}
?>
