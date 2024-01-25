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

function login($user)
{
  // Set session (log in)
  $_SESSION['user'] = ['email' => $user['email']];
}

function logout()
{
  // clear session files
  $_SESSION = [];

  // clear server session
  session_destroy();


  // Remove cookie in browser
  // Get the current local cookie params
  $params = session_get_cookie_params();

  // update the cookie to exire 1 hours ago
  setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['http']);
  // cookie: NAME, VALUE, Expiry Time, Path to cookie, Domain, 

  // Redirect to home
  header('Location:/');
  exit();
}
