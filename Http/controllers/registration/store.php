<?php

// dd($_POST); // Kiểm tra coi nhận được gì từ form

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
// Validate the form inputs
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password at least 7 characters.';
}

if (!empty($errors)) {
    return view('/registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// dd($user); // Có trả về 1 mảng, không có trả về false


if ($user) {
    // If yes, redirect to a login page
    header('location: /');
    exit();
} else {
    // If not, save one to the database, and then log the user in, and then redirect 
    $db->query('Insert into users (email, password) values (:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // mark that the users has logged in
    // $_SESSION['logged_in'] = true;

    login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}