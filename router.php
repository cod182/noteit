<?php
// Get the requested URL
$request_uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$routes = require('routes.php');


$base_path = '/noteit';
$uri = str_replace($base_path, '', $request_uri);

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
  require('views/error.view.php');
  die();
}
