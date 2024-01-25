<?php

// Static User Id
$userId = 1;



view('notes/create.view.php', ['heading' => 'Create a Note!', 'errors' => [], 'userId' => $userId]);
