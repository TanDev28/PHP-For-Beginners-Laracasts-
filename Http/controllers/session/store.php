<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

// Cần hiểu cách bắt lỗi chạy ngược lên trên tìm try catch gần nhất
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

// Khi ném lỗi throw thì các lệnh phía dưới không chạy nữa

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);
if (!$signedIn) {
    $form->error(
        'email',
        'No matching account found for that email address and password'
    )->throw();
}

redirect('/');