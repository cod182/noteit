<?php

$config = require("config.php");
$db = new Database($config['database']);

$heading = 'My Note';

$note = $db->query('SELECT * FROM notes Where id = :id', ['id' => $_GET['id']])->fetch();
require 'views/note.view.php';
