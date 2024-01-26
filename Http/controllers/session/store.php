<?php

use Core\Authenticator;
use Http\Forms\LoginForm;


// Check if passed validation using email & password
$form = LoginForm::validate(
  $attributes = ['email' => $_POST['email'], 'password' => $_POST['password']]
);

// No exception
$signedIn = (new Authenticator)->attempt(
  $attributes['email'],
  $attributes['password']
);

if (!$signedIn) {
  // Form Fails auth fails
  $form->error(
    'general',
    'No account found for email/password. Please try again'
  )->throw();;
}

redirect('/');
