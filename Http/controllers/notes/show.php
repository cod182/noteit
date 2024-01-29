<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->findOrFail();

// auth function to check if current user owns the note
authorize($note['user_id'] === $_SESSION['user']['id'], Response::FORBIDDEN);


view('notes/show.view.php', ['heading' => 'Your Note', 'note' => $note]);
