<?php
function urlIs($value)
{
  return $_SERVER['REQUEST_URI'] === $value;
}

// If current condition not met, run abort
function authorize($condition, $response = Response::FORBIDDEN)
{
  if (!$condition) {
    abort($response);
  }
}
