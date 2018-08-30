<?php

namespace App\Core;

use PDO;

class Connection
{
    public function make()
    {
        return new PDO(
            'dblib:host=' . getenv('DB_HOST') . 'dbname=' . getenv('DB_DATABASE'),
            getenv('DB_USERNAME'),
            getenv('DB_PASSWORD')
        );
    }
}