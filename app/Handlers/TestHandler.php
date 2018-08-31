<?php

namespace App\Handlers;

use App\Contracts\Handlers\TestHandlerInterface;
use App\Contracts\Repositories\TestRepositoryInterface;

class TestHandler implements TestHandlerInterface
{
    public function hello()
    {
        $response = new \stdClass();
        $response->message = 'hello world';
        return $response;
    }
}