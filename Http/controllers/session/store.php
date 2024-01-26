<?php

use Core\Authenticator;
use Http\Forms\LoginForm;


// Check if passed validation using email & password
$form = LoginForm::validate($attributes = ['email' => $_POST['email'], 'password' => $_POST['password']]);

if ((new Authenticator)->attempt($attributes['email'], $attributes['password'])) {
  // Redirect
  redirect('/');
}

$form->error('general', 'No account found for email/password. Please try again');


// Form Fails Validation or auth fails
