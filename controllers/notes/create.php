<?php

use Core\Database;
use Core\Validator;


// Db Connection
$config = require(base_path("config.php"));
$db = new Database($config['database']);


$errors = [];

// Static User Id
$userId = 1;

// Checking for 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Calling static class method
  if (!Validator::string($_POST['post'], 1, 2000)) {
    $errors['post'] = 'Please fill in a note of no more than 2,000 characters';
  };

  if (empty($errors)) {
    $db->query('INSERT INTO notes(title, post, user_id) VALUES(:title, :post, :user_id)', ['title' => htmlspecialchars($_POST['title']), 'post' => htmlspecialchars($_POST['post']), 'user_id' => $_POST['user_id']]);
  };
}


view('notes/create.view.php', ['heading' => 'Create a Note!', 'errors' => $errors, 'userId' => $userId]);
