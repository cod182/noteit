<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

// Validate form data

if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address';
};

if (!Validator::string($password)) {
  $errors['password'] = 'Please provide a valid password';
}

if (!empty($errors)) {
  return view('session/create.view.php', ['errors' => $errors]);
}

// Match the credentials from database
// Get database
$db = App::resolve(Database::class);
// Find All in users where the email matches the email from post form
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

// If user found
if ($user) {

  // Have user, but need to check password provided
  if (password_verify($password, $user['password'])) { // using php method, user password from DB, user password from form
    // True
    // Login user if credentials match
    login($user);
    // Redirect
    header('Location: /');
    exit();
  };
}

// Password validation failed / no user found
$errors['general'] = 'No account found for email/password. Please try again';

return view('session/create.view.php', ['errors' => $errors]);
