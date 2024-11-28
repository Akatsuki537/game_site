CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT,
    user_name VARCHAR(100),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game_id) REFERENCES games(id)
);

CREATE TABLE strategies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    game_id INT,
    user_name VARCHAR(100),
    title VARCHAR(200),
    content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (game_id) REFERENCES games(id)
);
