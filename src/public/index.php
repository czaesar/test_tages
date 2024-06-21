<?php

require_once __DIR__ . '/../app/Controllers/TweetController.php';
require_once __DIR__ . '/../app/Controllers/CategoryController.php';
require_once __DIR__ . '/../app/Models/Tweet.php';
require_once __DIR__ . '/../app/Models/Category.php';

$dbConfig = require __DIR__ . '/../config/database.php';

try {
    $db = new PDO("mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}", $dbConfig['user'], $dbConfig['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}

$tweetModel = new Tweet($db);
$tweetController = new TweetController($tweetModel);

$categoryModel = new Category($db);
$categoryController = new CategoryController($categoryModel);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'category_id' => $_POST['category_id'],
        'username' => $_POST['username'],
        'content' => $_POST['content']
    ];
    $tweetController->store($data);
    header("Location: /");
    exit();
}

$tweets = $tweetController->index();
$categories = $categoryController->index();

require __DIR__ . '/../views/layout.php';
