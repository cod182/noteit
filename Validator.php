<?php

class Validator
{
  public static function string($value, $min = 1, $max = INF)
  {
    // Validator::string($value, $min, $max)
    return strlen(trim($value)) >= $min && strlen($value) < $max;
  }

  public static function email($value)
  {
    // Validator::email('email@me.com')
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }
}
