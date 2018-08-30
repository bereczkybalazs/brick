<?php

namespace App\Core;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Connection $connection)
    {
        $this->model = $connection->make();
    }
}