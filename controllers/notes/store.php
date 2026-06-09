<?php

// dd("Hello"); //Kiểm tra xem đường dẫn chạy đc chưa

use Core\Database;
use Core\Validator;

$config = require base_path("config.php");
$db = new Database($config["database"]);


$errors = [];

if (! Validator::string($_POST['body'], 1, 50)) {
    $errors['body'] = "The body of no more than 50 characters is required.";
}

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Notes',
        'errors' => $errors
    ]);
}

if (empty($errors)) {
    $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
        "body" => $_POST["body"],
        "user_id" => 1
    ]);

    header('location: /notes');
    die();
}