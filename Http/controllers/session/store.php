<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $form->error('email', 'No matching account found for that email address and password');
}


// Cách này sửa được nhưng "dòng lỗi thông báo khi nhập sai form" vẫn còn dù load trang
$_SESSION['errors'] = $form->errors();
redirect('/login');

// //Gặp lỗi load lại trang và back trang khi nhập sai
// return view('/session/create.view.php', [
//     'errors' => $form->errors()
// ]);