<?php

require("functions.php");

require("router.php");
require("Database.php");
$config = require("config.php");



$db = new Database($config['database']);

$query = "SELECT * FROM posts where if = :id";

$db->query($query, ['id' => $id])->fetch();
