<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

// Get notes matching the ID of note provided
$note = $db->query('SELECT * FROM notes WHERE id = :id', ['id' => $_POST['id'],])->findOrFail();

// auth function to check if current user owns the note
authorize($note['user_id'] === $_SESSION['user']['id'], Response::FORBIDDEN);

//  Form Submitted, delete
$db->query('DELETE FROM notes WHERE id=:id', ['id' => $_POST['id']]);

// Redirect to notes page
redirect('/notes');
