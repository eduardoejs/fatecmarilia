<?php

namespace App\Classes;

class RandomString
{
    /**
     * Método random gera uma cadeia de string aleatoriamente
     * @return bool|string
     */
    public static function random()
    {
      $length = 10; // Tamanho da string a ser gerada
      $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!#&?$"; // Caracteres que vão compor a string
      $password = substr( str_shuffle( $chars ), 0, $length );
      return $password;
    }
}
