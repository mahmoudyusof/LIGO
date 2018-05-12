<?php

require 'vendor/autoload.php';

require "core/bootstrap.php";

use App\Core\{Request, Router};

$router = new Router;

require 'routes.php';

$router->direct(
    Request::uri(),
    Request::method()
);
