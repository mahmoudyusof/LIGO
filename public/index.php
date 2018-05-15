<?php

require 'vendor/autoload.php';

require "core/bootstrap.php";

use App\Core\{Request, Router};

$router = new Router;

require 'routes.php';

$dispatcher = fastRoute\simpleDispatcher(function (fastRoute\RouteCollector $r){
    global $router;
    foreach ($router->fetchRoutes() as $route){
        $r->addRoute($route[0], $route[1], $route[2]);
        // die(var_dump($route[1]));
    }
});


if(strpos(Request::uri(), ".")){
    // die(var_dump(Request::uri(), "first"));
    $filepath = __DIR__ . Request::uri();
    $filepath = str_ireplace("\\", "/", $filepath);
    echo Request::serve_static($filepath);
}else{
    // die(var_dump(Request::uri(), "second"));
    $routeinfo = $dispatcher->dispatch(Request::method(), Request::uri());
    switch ($routeinfo[0]){
        case FastRoute\Dispatcher::NOT_FOUND:
            die(var_dump("404 error for ".Request::uri()));
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            die(var_dump("asshole not allowed"));
            break;
        case FastRoute\Dispatcher::FOUND:
            try
            {
                if (is_array($routeinfo[1])){
                    $controller = new $routeinfo[1][0];
                    $function = $routeinfo[1][1];
                    $params = $routeinfo[2];
        
                    $controller->$function($params);
                }else{
                    $routeinfo[1]($routeinfo[2]["filename"]);
                }
            }catch(Exception $e)
            {
                die(var_dump($routeinfo));
            }
    }
}

// die(var_dump($routeinfo[1]));

// $router->direct(
//     Request::uri(),
//     Request::method()
// );
