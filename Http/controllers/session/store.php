<?php

use Core\Session;
use Core\Authenticator;
use Core\ValidationException;
use Http\Forms\LoginForm;

try {

    $form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
    ]);
} catch (ValidationException $exception) {

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    redirect('/login');
}


if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
    redirect('/');
}
$form->error('email', 'No matching account found for that email address and password');
// Session::flash('errors', $form->errors());
// Session::flash('old', $attributes);
redirect('/login');