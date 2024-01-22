<?php

use Core\Database;
use Core\Response;

$config = require(base_path("config.php"));
$db = new Database($config['database']);

// Current User Hard Coded. Needs changing to session
$currentUserId = 1;


// Check if Post Request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Get notes matching the ID of note provided
  $note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id'],])->findOrFail();

  // auth function to check if current user owns the note
  authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);

  //  Form Submitted, delete
  $db->query('DELETE FROM notes WHERE id=:id', ['id' => $_POST['id']]);

  // Redirect to notes page
  header('Location: /notes');
  // Exit
  exit();
}



$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->findOrFail();

// auth function to check if current user owns the note
authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);


view('notes/show.view.php', ['heading' => 'Your Note', 'note' => $note]);
