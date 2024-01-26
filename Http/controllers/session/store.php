<?php

use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// New LoginForm instance
$form = new LoginForm;

// Check if passed validation using email & password
if ($form->Validate($email, $password)) {

  if ((new Authenticator)->attempt($email, $password)) {
    // Redirect
    redirect('/');
  }
  $form->error('general', 'No account found for email/password. Please try again');
  var_dump($form->errors());
}

// Form Fails Validation or auth fails

// Set flashed error in session to persist
Session::flash('errors', $form->errors());
Session::flash('old', ['email' => $email]);

// Redirect back to login to avoid form submission
return redirect('/login');
