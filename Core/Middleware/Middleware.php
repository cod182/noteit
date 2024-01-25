<?php

namespace Core\Middleware;

class Middleware
{
  // A Map for the different middleware linked to associated class
  public const MAP = [
    'guest' => Guest::class,
    'authenticated' => Authenticated::class,
  ];

  public static function resolve($key)
  {
    if (!$key) {
      return;
    }

    $middleware = static::MAP[$key] ?? false; // Matches the route middleware to the map and returns the associated class. If key not recognized, returns false

    // if the middleware is false
    if (!$middleware) {
      throw new \Exception("No middleware found for key '{$key}'"); // Throwing a new exception for the key not recognized
    }

    (new $middleware)->handle(); //Dynamically instantiates a new instance of the class returned by the middleware and runs handle 
  }
}
