<?php

namespace Core;

use PDO;

final class Connection
{
    static private $connection;

    static public function getInstance()
    {
        if (!self::$connection) {
            self::$connection = new PDO(
                $_ENV['DB_CONNECTION'] .
                ':host=' . $_ENV['DB_HOST'] . ':' . $_ENV['DB_PORT'] .
                ';dbname=' . $_ENV['DB_DATABASE'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD']
            );
            self::$connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        return self::$connection;
    }

    private function __construct()
    {
    }

}