<?php
$config = require("config.php");
$db = new Database($config['database']);

$heading = 'My Note';

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->findOrFail();


// Current User Hard Coded. Needs changing to session
$currentUserId = 1;


// auth function to check if current user owns the note
authorize($note['user_id'] === $currentUserId, Response::FORBIDDEN);


require 'views/note.view.php';
