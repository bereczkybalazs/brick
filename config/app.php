<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR .'helpers.php');

require_all(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app');

use BereczkyBalazs\BrickCore\App;
use Phroute\Phroute\RouteCollector;
use BereczkyBalazs\BrickCore\RouterResolver;
use BereczkyBalazs\BrickCore\InterfaceBinder;
use BereczkyBalazs\BrickCore\RouteDispatcher;
use League\Di\Container;
use Symfony\Component\Dotenv\Dotenv;

$app = new App(
    new RouteCollector(),
    new Container(),
    new InterfaceBinder()
);

$env = new Dotenv();
$env->load(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '.env');

require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'routes' . DIRECTORY_SEPARATOR . 'web.php');

$app->bindInterfaces();
$resolver = new RouterResolver($app->container);
$dispatcher = new RouteDispatcher($app->router->getData(), $resolver);

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo json_encode($response);