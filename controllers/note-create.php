<?php
// Db Connection
$config = require("config.php");
$db = new Database($config['database']);

$heading = 'Create a Note!';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (strlen($_POST['post']) === 0) {
    $errors['post'] = ' Please fill in your note!';
  }
  if (strlen($_POST['post']) > 2000) {
    $errors['post'] = 'Too many characters! Note max length is 2000 characters!';
  }

  if (empty($errors)) {
    $db->query('INSERT INTO notes(title, post, user_id) VALUES(:title, :post, :user_id)', ['title' => htmlspecialchars($_POST['title']), 'post' => htmlspecialchars($_POST['post']), 'user_id' => $_POST['user_id']]);
  };
}

$userId = 1;

require('views/note-create.view.php');
