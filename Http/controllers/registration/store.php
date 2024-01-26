<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

// New LoginForm instance
$form = new LoginForm;
// Check if passed validation using email & password
if (!$form->Validate($email, $password)) {
  // Fails Validation
  if (!empty($errors)) {
    return view('session/create.view.php', ['errors' => $form->errors()]); // Getting errors from form errors function getter
  }
}

// Check if email in use
// Get database
$db = App::resolve(Database::class);
// Checking for email in db
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

// if true - redirect to login
if ($user) {
  redirect('/login');
} else {
  // False - Save to database / redirect 
  // Insert into database
  $db->query('INSERT INTO users (email, password) VALUES(:email, :password)', ['email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT)]);

  // Mark that user has logged in
  $auth = new Authenticator();
  $auth->login($user);
  // Redirect
  redirect('/');
}
