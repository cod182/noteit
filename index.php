<?php

require("functions.php");

require("Database.php");

require("router.php");
$config = require("config.php");



$db = new Database($config['database']);

$query = "SELECT * FROM notes where if = :id";

$db->query($query, ['id' => $id])->fetch();
