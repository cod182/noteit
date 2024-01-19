<?php

$config = require("config.php");
$db = new Database($config['database']);

$heading = 'My Notes';

$notes = $db->query('SELECT * FROM notes Where user_id = 1')->getAll();
require 'views/notes/index.view.php';
