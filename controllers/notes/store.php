<?php

use Core\App;
use Core\Validator;
use Core\Database;


// Db Connection
$db = App::resolve(Database::class);



$errors = [];

// Static User Id
$userId = 1;

// Checking for 

// Calling static class method
if (!Validator::string($_POST['post'], 1, 2000)) {
  $errors['post'] = 'Please fill in a note of no more than 2,000 characters';
};

if (!empty($errors)) {
  return view('notes/create.view.php', ['heading' => 'Create a Note!', 'errors' => $errors, 'userId' => $userId]);
}

if (empty($errors)) {
  $db->query('INSERT INTO notes(title, post, user_id) VALUES(:title, :post, :user_id)', ['title' => htmlspecialchars($_POST['title']), 'post' => htmlspecialchars($_POST['post']), 'user_id' => $_POST['user_id']]);
  header('Location:/notes');
  die();
};

// Validation Issue
