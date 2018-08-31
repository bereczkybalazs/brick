<?php

namespace App\Handlers;

use App\Constants;
use App\Contracts\Handlers\TestHandlerInterface;
use Curl\Curl;

class TestHandler implements TestHandlerInterface
{
    private $curl;

    public function __construct(Curl $curl)
    {
        $this->curl = $curl;
    }

    public function hello()
    {
        $response = new \stdClass();
        $response->message = 'hello world';
        return $response;
    }
}