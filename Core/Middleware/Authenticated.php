<?php

namespace Core\Middleware;

class Authenticated
{
  // To handle if the request can continue in application
  public function handle()
  {

    if (!$_SESSION['user'] ?? false) { // If the session contains user
      // True - User is not in the session. User is not a guest
      header('Location:/'); // Redirect to home
      exit();
    };
  }
}
