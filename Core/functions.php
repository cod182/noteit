<?php

use Core\Response;
use Core\Router;

function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

// If current condition not met, run abort
function authorize($condition, $response = Response::FORBIDDEN)
{
  if (!$condition) {
    Router::abort($response);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
  extract($attributes);

  require base_path('views/' . $path);
}
