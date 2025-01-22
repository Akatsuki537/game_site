<!DOCTYPE html>
<html lang="ja">

<header>
        <h1>ゲーム情報まとめサイト</h1>
        <nav>
            <a href="index.php">ホーム</a>
            <a href="games.php">ゲーム一覧</a>
            <a href="about.php">サイトについて</a>
            <a href="contact.php">お問い合わせ</a>
        </nav>
    </header>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>お問い合わせフォーム</h1>
    </header>
    <main>
        <form method="POST" action="contact_submit.php">
            <label for="name">お名前:</label><br>
            <input type="text" id="name" name="name" required><br>

            <label for="email">メールアドレス:</label><br>
            <input type="email" id="email" name="email" required><br>

            <label for="message">メッセージ:</label><br>
            <textarea id="message" name="message" rows="5" required></textarea><br>

            <button type="submit">送信</button>
        </form>
    </main>
</body>
</html>
