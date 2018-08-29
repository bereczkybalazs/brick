<?php

namespace App\Controllers;

use App\Handlers\TestHandler;

class TestController
{
    private $testHandler;

    public function __construct(TestHandler $testHandler)
    {
        $this->testHandler = $testHandler;
    }

    public function index()
    {
        return $this->testHandler->hello();
    }
}