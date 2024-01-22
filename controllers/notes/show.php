<?php

use Core\Database;
use Core\Response;

$config = require(base_path("config.php"));
$db = new Database($config['database']);

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->findOrFail();


// Current User Hard Coded. Needs changing to session
$currentUserId = 1;


// auth function to check if current user owns the note
authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);


view('notes/show.view.php', ['heading' => 'Your Note', 'note' => $note]);
