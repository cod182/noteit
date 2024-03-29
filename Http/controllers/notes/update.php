<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;


$db = App::resolve(Database::class);


// Find note
$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_POST['id'],])->findOrFail();
// Authorise check
authorize($note['user_id'] === $_SESSION['user']['id'], Response::FORBIDDEN);

// Validate form
$errors = [];

if (!Validator::string($_POST['post'], 1, 2000)) {
  $errors['post'] = 'Please fill in a note of no more than 2,000 characters';
};

// if no errors, update record in db table
if (!empty($errors)) {
  return view('notes/edit.view.php', ['heading' => 'Update your Note!', 'errors' => $errors, 'userId' => $_SESSION['user']['id'], 'note' => $note]);
}

if (empty($errors)) {
  $db->query('UPDATE notes SET title = :title, post = :post WHERE id = :id', ['title' => htmlspecialchars($_POST['title']), 'post' => htmlspecialchars($_POST['post']), 'id' => $_POST['id']]);
  redirect('/notes');
};
