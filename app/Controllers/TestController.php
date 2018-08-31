<?php

namespace App\Controllers;

use App\Contracts\Handlers\TestHandlerInterface;
use Core\Request;

class TestController
{
    private $testHandler;

    public function __construct(TestHandlerInterface $testHandler)
    {
        $this->testHandler = $testHandler;
    }

    public function index($id, Request $request)
    {
        return $this->testHandler->hello();
    }
}