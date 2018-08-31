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
        $this->curl->setHeader('API_KEY', $_ENV['USERS_API_KEY']);
        $this->curl->get('http://users.velopene.site/');
        return json_decode($this->curl->response);
    }
}