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

if (!Validator::string($password, 7, 255)) {
  $errors['password'] = 'Password must be at least 7 characters ';
}

if (!empty($errors)) {
  return view('registration/create.view.php', ['errors' => $errors]);
}

// Check if email in use
// Get database
$db = App::resolve(Database::class);
// Checking for email in db
$user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();

// if true - redirect to login
if ($user) {
  header('Location: /login');
  exit();
} else {
  // False - Save to database / redirect 
  // Insert into database
  $db->query('INSERT INTO users (email, password) VALUES(:email, :password)', ['email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT)]);

  // Mark that user has logged in
  login($user);
  // Redirect
  header('Location: /');
  exit();
}
