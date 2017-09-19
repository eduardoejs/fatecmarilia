<?php

namespace App\Classes;

class RandomString
{
    public static function random()
    {
      $length = 10;
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#&?$";
      $password = substr( str_shuffle( $chars ), 0, $length );
      return $password;
    }
}
