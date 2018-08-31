<?php

namespace App\Repositories;

use App\Contracts\Repositories\TestRepositoryInterface;
use BereczkyBalazs\BrickCore\BaseRepository;

class TestRepository extends BaseRepository implements TestRepositoryInterface
{
    public function all()
    {
        return $this->model->query('SELECT * FROM test')
            ->fetchAll();
    }
}