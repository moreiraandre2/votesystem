<?php

namespace Source\Utils; 

use PDO;
use PDOException;

Class Connect
{
    static function connect()
    {
        try {
            $conn = new PDO("mysql:host=localhost;dbname=voting", "root", "");
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
          } catch(PDOException $e) {
            return $e->getMessage();
          }
    }
}