<?php
require 'db.php';
$query = "SELECT * FROM games ORDER BY id ASC";
$result = $conn->query($query);
while ($row = $result->fetch_assoc()) {
    echo '<a href="game_detail.php?game_id=' . $row['id'] . '">' . htmlspecialchars($row['name']) . '</a><br>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($game['name']); ?> - ゲーム情報</title>
</head>
<body>
    <h1><?php echo htmlspecialchars($game['name']); ?></h1>
    <a href="board.php?game_id=<?php echo $game_id; ?>">掲示板</a> |
    <a href="strategies.php?game_id=<?php echo $game_id; ?>">攻略情報</a>
</body>
</html>
