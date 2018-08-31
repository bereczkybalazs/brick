<?php

require_once(__DIR__ . DIRECTORY_SEPARATOR .'helpers.php');

require_all(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'core');
require_all(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'app');

use Core\App;
use Phroute\Phroute\RouteCollector;
use Core\RouterResolver;
use Core\InterfaceBinder;
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
$dispatcher = new Phroute\Phroute\Dispatcher($app->router->getData(), $resolver);

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

header("Access-Control-Allow-Origin: *");
header('Content-Type: application/json');
echo json_encode($response);