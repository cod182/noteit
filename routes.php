<?php
// return [
//   '/' => 'controllers/index.php',
//   '/about' => 'controllers/about.php',
//   '/notes' => 'controllers/notes/index.php',
//   '/notes/create' => 'controllers/notes/create.php',
//   '/note' => 'controllers/notes/show.php',
//   '/contact' => 'controllers/contact.php',
// ];

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('authenticated');
$router->get('/note', 'controllers/notes/show.php')->only('authenticated');
$router->get('/note/edit', 'controllers/notes/edit.php')->only('authenticated');
$router->patch('/note', 'controllers/notes/update.php')->only('authenticated');


$router->delete('/note', 'controllers/notes/destroy.php')->only('authenticated');

$router->get('/notes/create', 'controllers/notes/create.php')->only('authenticated');
$router->post('/notes', 'controllers/notes/store.php')->only('authenticated');

$router->get('/register', 'controllers/registration/create.php')->only('guest');

$router->post('/register', 'controllers/registration/store.php')->only('guest');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/login', 'controllers/session/store.php')->only('guest');

$router->delete('/session', 'controllers/session/destroy.php')->only('authenticated');
