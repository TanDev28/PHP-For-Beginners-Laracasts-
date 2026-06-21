<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm;
if (! $form->validate($email, $password)) {
    return view('/session/create.view.php', [
        'errors' => $form->errors()
    ]);
}

//match the credentials
$auth = new Authenticator;
if ($auth->attempt($email, $password)) {
    redirect('/');
}

return view('/session/create.view.php', [
    'errors' => [
        'email' => 'No matching account found for that email address and password'
    ]
]);