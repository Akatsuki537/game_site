<?php
// フォームが送信された場合の処理
$message_sent = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    if (!empty($name) && !empty($email) && !empty($message)) {
        // メール送信の処理
        $to = "admin@example.com"; // 管理者のメールアドレスを設定
        $subject = "お問い合わせフォームからのメッセージ";
        $body = "名前: $name\nメール: $email\n\n$message";
        $headers = "From: $email";

        // PHP の mail() 関数で送信 (開発環境では動作しない場合があります)
        if (mail($to, $subject, $body, $headers)) {
            $message_sent = true;
        } else {
            echo "<p>エラー: メッセージの送信に失敗しました。</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ - ゲーム情報まとめサイト</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>ゲーム情報まとめサイト</h1>
        <nav>
            <a href="index.php">ホーム</a>
            <a href="games.php">ゲーム一覧</a>
            <a href="about.php">サイトについて</a>
            <a href="contact.php">お問い合わせ</a>
        </nav>
    </header>

    <main>
        <section class="contact-form">
            <h2>お問い合わせ</h2>
            <?php if ($message_sent): ?>
                <p class="success-message">お問い合わせありがとうございました！追ってご連絡いたします。</p>
            <?php else: ?>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">お名前:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="message">メッセージ:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit">送信</button>
                </form>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 ゲーム情報まとめサイト</p>
    </footer>
</body>
</html>
