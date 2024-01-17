<?php
// Get the requested URL
$request_uri = parse_url($_SERVER['REQUEST_URI'])['path'];



$base_path = '/noteit';
$uri = str_replace($base_path, '', $request_uri);

$routes = [
  '/' => 'controllers/index.php',
  '/about' => 'controllers/about.php',
  '/contact' => 'controllers/contact.php',
  '/notes' => 'controllers/notes.php',
  '/note' => 'controllers/note.php',

];

routeToController($uri, $routes);

function routeToController($uri, $routes)
{
  if (array_key_exists($uri, $routes)) {
    require($routes[$uri]);
  } else {
    abort();
  };
};

function abort($statusCode = 404)
{
  http_response_code($statusCode);
  abort();
  die();
}
