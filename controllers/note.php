<?php

$config = require "config.php";
$db = new Database($config["database"]);

$heading = "My Notes";
$currentID = 1;

// Kiểm tra xem có dòng dữ liệu hợp lệ không? Có - trả về dữ liệu đó; Không - Trả về false
$note = $db->query("select * from notes where id = :id", [":id" => $_GET["id"]])->fetch();

// Kiểm tra nếu không tồn tại dữ liệu
if (! $note) {
    abort();
}

// Trường hợp có dữ liệu nhưng không thuộc sở hữu
if ($note["user_id"] !== $currentID) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";