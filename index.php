<?php

require "functions.php";
// require "router.php";

// connect to our MySQL database
$dsn = "mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4";

$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * FROM posts");
$statement->execute();

// $posts = $statement->fetchAll(); // Bị trùng lặp
$posts = $statement->fetchAll(PDO::FETCH_ASSOC); // Xử lý trùng lặp

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}