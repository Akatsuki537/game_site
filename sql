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

/*原神の追加SQL*/
INSERT INTO games (name, description) VALUES ('原神', 'オープンワールド型のアクションRPG');

INSERT INTO games (name, description) VALUES 
('ゼルダの伝説 ブレス オブ ザ ワイルド', 'オープンワールド型のアクションアドベンチャーゲーム'),
('モンスターハンターライズ', 'モンスター討伐アクションゲーム'),
('ファイナルファンタジーXIV', '人気のMMORPG'),
('ペルソナ5 ロイヤル', 'スタイリッシュなRPG'),
('エルデンリング', '高難易度アクションRPG');

INSERT INTO games (name, description) VALUES 
('Call of Duty: Modern Warfare II', 'ミリタリーFPSの代表作'),
('Apex Legends', 'バトルロイヤル型の無料FPS'),
('Counter-Strike: Global Offensive', '競技シーンで人気のFPSゲーム'),
('Battlefield 2042', '大規模な戦場を舞台にしたFPS'),
('DOOM Eternal', '爽快感あふれるスピーディなアクションFPS');

INSERT INTO games (name, description) VALUES 
('ドラゴンクエストXI 過ぎ去りし時を求めて', '王道ファンタジーRPG。美麗なグラフィックと感動的なストーリー'),
('ファイナルファンタジーVII リメイク', '名作のリメイク。リアルタイムバトルと壮大な物語'),
('テイルズ オブ アライズ', 'アクション性の高い戦闘と美しいビジュアル'),
('ペルソナ5', '現代日本を舞台にしたスタイリッシュRPG'),
('ウィッチャー3 ワイルドハント', 'オープンワールドの自由度と濃密なストーリーが特徴のファンタジーRPG');

INSERT INTO games (name, description) VALUES 
('Fate/Grand Order', 'サーヴァントと共に歴史を守る壮大な物語RPG'),
('グランブルーファンタジー', '美麗なイラストと奥深い戦闘システムを備えたファンタジーRPG'),
('パズル＆ドラゴンズ', 'パズルとRPGの融合ゲーム。戦略的なプレイが楽しい'),
('モンスターストライク', 'ひっぱりアクションとRPG要素を融合したゲーム'),
('プリンセスコネクト！Re:Dive', '豪華なアニメーションとフルボイスストーリーが特徴のRPG');


/*すでに存在するテーブルを再作成する場合は、最初にテーブルを削除する必要があります。*/
DROP TABLE IF EXISTS posts;
DROP TABLE IF EXISTS strategies;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS games;
