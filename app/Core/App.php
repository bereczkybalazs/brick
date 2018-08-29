<?php
namespace App\Core;

use League\Di\Container;
use Phroute\Phroute\RouteCollector;

class App
{
    public $router;
    public $container;
    private $interfaceBinder;

    public function __construct(
        RouteCollector $routeCollector,
        Container $container,
        InterfaceBinder $interfaceBinder
    ) {
        $this->router = $routeCollector;
        $this->container = $container;
        $this->interfaceBinder = $interfaceBinder;
    }

    public function bindInterfaces()
    {
        $this->interfaceBinder->bindInterfaces($this->container);
    }
}