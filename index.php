<?php

require 'vendor/autoload.php';

require "core/bootstrap.php";

$qb = $app['database'];

$router = new Router;

require 'routes.php';

require $router->direct(
    Request::uri(),
    $_SERVER['REQUEST_METHOD']
);
