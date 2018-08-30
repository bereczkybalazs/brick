<?php

namespace App\Handlers;

use App\Contracts\Handlers\TestHandlerInterface;
use App\Contracts\Repositories\TestRepositoryInterface;

class TestHandler implements TestHandlerInterface
{
    private $testRepository;

    public function __construct(TestRepositoryInterface $testRepository)
    {
        $this->testRepository = $testRepository;
    }

    public function hello()
    {
        $response = new \stdClass();
        $response->text = 'hello world';
        $response->items = $this->testRepository->all();
        return $response;
    }
}