<?php

namespace App\Core;

use PDO;

class Connection
{
    static private $connection;

    static public function getInstance()
    {
        if (!self::$connection) {
            self::$connection = new PDO(
                getenv('DB_CONNECTION') .
                ':host=' . getenv('DB_HOST') . ':' . getenv('DB_PORT') .
                ';dbname=' . getenv('DB_DATABASE'),
                getenv('DB_USERNAME'),
                getenv('DB_PASSWORD')
            );
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$connection;
    }

    private function __construct()
    {
    }

}