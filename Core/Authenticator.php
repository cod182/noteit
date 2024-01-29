<?php

namespace Core;

class Authenticator
{

  public function login($user)
  {
    // Set session (log in)
    $_SESSION['user'] = ['email' => $user['email'], 'id' => $user['id']];
  }

  public function logout()
  {
    // clear session files
    Session::destroy();


    return true;
  }


  public function attempt($email, $password)
  {
    // Match the credentials from database
    // Find All in users where the email matches the email from post form
    $user = App::resolve(Database::class)->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->find();
    if ($user) {

      // Have user, but need to check password provided
      if (password_verify($password, $user['password'])) { // using php method, user password from DB, user password from form
        // True
        // Login user if credentials match
        $this->login($user);
        return true;
      };
    }
    return false;
  }
}
