<?php
namespace App;

use Phroute\Phroute\RouteCollector;

class App
{
    public $router;

    public function __construct(RouteCollector $routeCollector)
    {
        $this->router = $routeCollector;
    }
}