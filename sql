/* データベース作成 */
CREATE DATABASE game_site;

/*gamesテーブル作成*/
CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

/*postsテーブル作成(掲示板用)*/
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

/*strategiesテーブル作成（攻略情報用）*/
CREATE TABLE strategies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

/*usersテーブル作成（ユーザー情報が必要な場合）*/
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


/*崩壊スターレイルのゲームを追加するSQL*/
INSERT INTO games (name, description) VALUES ('崩壊スターレイル', '広大な宇宙を冒険し、壮大なストーリーを楽しむRPG。');

/*すでに存在するテーブルを再作成する場合は、最初にテーブルを削除する必要があります。*/
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS strategies;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS games;
