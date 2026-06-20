<?php

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
    $errors['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    return view('/session/create.view.php', [
        'errors' => $errors
    ]);
}

//match the credentials
$db = App::resolve(Database::class);
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

// Nhược điểm code quá dài
if ($user) {
    if (password_verify($password, $user['password'])) {
        login([
            'email' => $email
        ]);

        header('location: /');
        exit();
    }
}

return view('/session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);