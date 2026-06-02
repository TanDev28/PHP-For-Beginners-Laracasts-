<?php

require "functions.php";
// require "router.php";

require "Database.php";

$config = [
    "host" => "localhost",
    "port" => 3306,
    "dbname" => "myapp",
    "charset" => "utf8mb4"
];

$db = new Database($config);

$posts = $db->query("select * FROM posts")->fetchAll();

dd($posts);
