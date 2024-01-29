<?php

use Core\App;
use Core\Database;


$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes Where user_id = :id', ['id' => $_SESSION['user']['id']])->getAll();

view('notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);
