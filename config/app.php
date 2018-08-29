<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR .'helpers.php');

require_all(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app');

use App\App;
use Phroute\Phroute\RouteCollector;
use App\RouterResolver;
use App\InterfaceBinder;
use League\Di\Container;

$app = new App(
    new RouteCollector(),
    new Container(),
    new InterfaceBinder()
);

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php');

$app->bindInterfaces();
$resolver = new RouterResolver($app->container);
$dispatcher = new Phroute\Phroute\Dispatcher($app->router->getData(), $resolver);

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

header('Content-Type: application/json');
echo json_encode($response);