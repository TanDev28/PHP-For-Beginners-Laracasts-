<?php

require "functions.php";
// require "router.php";

require "Database.php";

$config = require "config.php";
$db = new Database($config["database"]);

$id = $_GET['id'];
// $query = "select * FROM posts where id = {$id}"; //Sự nguy hiểm của chèn trực tiếp như này, hacker có thể chèn thêm drop table

// Cách khắc phục 1 
// $query = "select * FROM posts where id = ?";
// $posts = $db->query($query, [$id])->fetch();

// Cách khắc phục 2
$query = "select * FROM posts where id = :id";
$posts = $db->query($query, ["id" => $id])->fetch();

dd($posts);
