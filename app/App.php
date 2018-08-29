<?php
namespace App;

use League\Di\Container;
use Phroute\Phroute\RouteCollector;

class App
{
    public $router;
    public $container;

    public function __construct(
        RouteCollector $routeCollector,
        Container $container
    ) {
        $this->router = $routeCollector;
        $this->container = $container;
    }
}