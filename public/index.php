<?php


use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . '/../';

require(BASE_PATH . '/vendor/autoload.php');

require BASE_PATH . 'Core/functions.php';
require base_path('bootstrap.php');

// new router instance
$router = new \Core\Router();

$routes = require(base_path('routes.php'));

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// If there is a _method is post, user the value, otherwise use the request method of the server method
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

try {
  // Router->method
  $router->route($uri, $method);
} catch (ValidationException $exception) {
  // Set flashed error in session to persist
  Session::flash('errors', $exception->errors);
  Session::flash('old', $exception->old);
  // Redirect back to previous url
  return redirect($router->previousUrl());
}

// Removes the flashed messages from session
Session::unflash();
