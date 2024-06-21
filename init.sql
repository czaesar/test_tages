CREATE DATABASE IF NOT EXISTS twitter;

USE twitter;

CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL
    );

CREATE TABLE IF NOT EXISTS tweets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT NOT NULL,
    username VARCHAR(255) NOT NULL,
    content VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id)
    );


INSERT INTO categories (title) VALUES
                                   ('общии'),
                                   ('ковид'),
                                   ('шутки');
