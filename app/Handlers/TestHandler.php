<?php

namespace App\Handlers;

use App\Contracts\Handlers\TestHandlerInterface;

class TestHandler implements TestHandlerInterface
{
    public function hello()
    {
        return 'hello world';
    }
}