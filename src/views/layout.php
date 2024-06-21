<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Tweets</h1>
<form action="/" method="post">
    <label for="category">Category:</label>
    <select name="category_id" id="category">
        <?php foreach ($categories as $category): ?>
            <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br>

    <label for="content">Tweet:</label>
    <textarea name="content" id="content" required></textarea><br>

    <button type="submit">Tweet</button>
</form>

<h2>All Tweets</h2>
<ul>
    <?php foreach ($tweets as $tweet): ?>
        <li>
            <strong><?= $tweet['category_title'] ?></strong>: <?= $tweet['content'] ?> - by <?= $tweet['username'] ?> at <?= $tweet['created_at'] ?>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
