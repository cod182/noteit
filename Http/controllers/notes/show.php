<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);


// Current User Hard Coded. Needs changing to session
$currentUserId = 1;

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->findOrFail();

// auth function to check if current user owns the note
authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);


view('notes/show.view.php', ['heading' => 'Your Note', 'note' => $note]);
