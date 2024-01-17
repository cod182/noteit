<?php
$config = require("config.php");
$db = new Database($config['database']);

$heading = 'My Note';

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id'],])->fetch();

if (!$note) {
  abort(Response::NOT_FOUND);
}

// Current User Hard Coded. Needs changing to session
$currentUserId = 1;

if ($note['user_id'] != $currentUserId) {
  abort(Response::FORBIDDEN);
}

require 'views/note.view.php';
