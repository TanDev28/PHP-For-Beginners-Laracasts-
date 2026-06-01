<?php

require "functions.php";
// require "router.php";

require "Database.php";

$db = new Database();
// Phân biệt fetch và fetchAll
// $posts = $db->query("select * FROM posts where id > 1")->fetchAll(PDO::FETCH_ASSOC);
// $posts = $db->query("select * FROM posts where id > 1")->fetch(PDO::FETCH_ASSOC);
$posts = $db->query("select * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

dd($posts);
