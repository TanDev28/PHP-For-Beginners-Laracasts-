<?php

require "Validator.php";

$config = require "config.php";
$db = new Database($config["database"]);

// dd(Validator::email('tan@gmail.com')); // Trả về false nếu sai, ngược lại trả về chính định dạng email đúng tan@gmail.com

$heading = "Create Notes";

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $errors = [];
    if (! Validator::string($_POST['body'], 1, 50)) {
        $errors['body'] = "The body of no more than 50 characters is required.";
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            "body" => $_POST["body"],
            "user_id" => 1
        ]);
    }
}


require "views/note-create.view.php";