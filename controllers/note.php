<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "My Notes";
$currentID = 1;

// Kiểm tra xem có dòng dữ liệu hợp lệ không? Có - trả về dữ liệu đó; Không - Trả về false
$note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->findOrFail();
// $note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]]);
// dd($note); // hiện tại $note đang là PDOStatement, cho nên phương thức fetch() là của PDOStatement
// cho nên $db->query cần trả về $this để mở rộng thêm phương thức

authorize($note["user_id"] === $currentID);

require "views/note.view.php";