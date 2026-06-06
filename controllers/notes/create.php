<?php

// require "Validator.php";

$config = require base_path("config.php");
$db = new Database($config["database"]);

// dd(Validator::email('tan@gmail.com')); // Trả về false nếu sai, ngược lại trả về chính định dạng email đúng tan@gmail.com

$errors = [];
if ($_SERVER['REQUEST_METHOD'] == "POST") {


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

view("notes/create.view.php", [
    'heading' => 'Create Notes',
    'errors' => $errors
]);
