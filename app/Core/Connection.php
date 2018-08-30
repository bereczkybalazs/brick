<?php

namespace App\Core;

use PDO;

class Connection
{
    public function make()
    {
        $connection = new PDO(
            getenv('DB_CONNECTION') .
            ':host=' . getenv('DB_HOST') . ':'. getenv('DB_PORT') .
            ';dbname=' . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );
        $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $connection;
    }
}