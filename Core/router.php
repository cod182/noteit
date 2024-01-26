<?php

namespace Core;

use Core\Middleware\Authenticated;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{

  protected $routes = [];

  public function add($method, $uri, $controller)
  {
    $this->routes[] = [
      'uri' => $uri,
      'controller' => $controller,
      'method' => $method,
      'middleware' => null,
    ];
    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add('GET', $uri, $controller);
  }

  public function post($uri, $controller)
  {
    return $this->add('POST', $uri, $controller);
  }

  public function delete($uri, $controller)
  {
    return $this->add('DELETE', $uri, $controller);
  }

  public function patch($uri, $controller)
  {
    return $this->add('PATCH', $uri, $controller);
  }

  public function put($uri, $controller)
  {
    return $this->add('PUT', $uri, $controller);
  }

  public function only($key)
  {
    // Middleware function
    // Checks for the last item in the routes array and applies the given key
    $this->routes[array_key_last($this->routes)]['middleware'] = $key;

    // Returned for potential to chain
    return $this->routes;
  }

  public function route($uri, $method)
  {
    foreach ($this->routes as $route) {
      // Checks if the URI and Method are the same
      if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

        // Middleware checks
        Middleware::resolve($route['middleware']);


        return require base_path('Http/controllers/' . $route['controller']);
      }
    };
    $this->abort();
  }

  public function previousUrl()
  {
    return $_SERVER['HTTP_REFERER'];
  }

  static function abort($statusCode = 404)
  {
    http_response_code($statusCode);
    view('error.view.php', ['statusCode' => $statusCode]);
    die();
  }
}
