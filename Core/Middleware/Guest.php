<?php

namespace Core\Middleware;

class Guest
{
  // To handle if the request can continue in application
  public function handle()
  {

    if ($_SESSION['user'] ?? false) { // If the session contains user
      // True - User in the session. User is not a guest
      redirect('/');
    };
  }
}
