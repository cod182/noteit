<?php

session_start();

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

// Autoloading functions
spl_autoload_register(function ($class) {
  $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

  require base_path("{$class}.php");
});

require base_path('bootstrap.php');

// new router instance
$router = new \Core\Router();

$routes = require(base_path('routes.php'));

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// If there is a _method is post, user the value, otherwise use the request method of the server method
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Router->method
$router->route($uri, $method);
