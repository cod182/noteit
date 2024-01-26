<?php

// log user out
use Core\Authenticator;

$auth = new Authenticator();
$auth->logout();

// If logged out successfully
if ($auth) {
  // Redirect to home
  redirect('/');
}
