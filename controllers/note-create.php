<?php
// Db Connection
$config = require("config.php");
$db = new Database($config['database']);

$heading = 'Create a Note!';

$formValid = true;;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!$_POST['post']) {
    $formValid = false;
  } else {
    $db->query('INSERT INTO notes(title, post, user_id) VALUES(:title, :post, :user_id)', ['title' => htmlspecialchars($_POST['title']), 'post' => htmlspecialchars($_POST['post']), 'user_id' => $_POST['user_id']]);
  }
}

$userId = 1;

require('views/note-create.view.php');
