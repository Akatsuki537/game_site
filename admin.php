<?php
require 'db.php';

$query = "SELECT * FROM contact_messages ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせ管理ページ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>お問い合わせ一覧</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>メッセージ</th>
            <th>日時</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['name']); ?></td>
                <td><?php echo htmlspecialchars($row['email']); ?></td>
                <td><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                <td><?php echo $row['created_at']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
