<?php

namespace App\Controllers;

use App\Contracts\Handlers\TestHandlerInterface;

class TestController
{
    private $testHandler;

    public function __construct(TestHandlerInterface $testHandler)
    {
        $this->testHandler = $testHandler;
    }

    public function index()
    {
        return $this->testHandler->hello();
    }
}