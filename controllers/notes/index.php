<?php

use Core\Database;


$config = require(base_path("config.php"));
$db = new Database($config['database']);
$notes = $db->query('SELECT * FROM notes Where user_id = 1')->getAll();

view('notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);